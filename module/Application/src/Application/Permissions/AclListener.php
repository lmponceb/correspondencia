<?php
namespace Application\Permissions;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

class AclListener implements ListenerAggregateInterface{
    
    protected $listeners = array();
    
    public function attach(EventManagerInterface $events, $priority = 100){
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), $priority);
    }
    
    public function detach(EventManagerInterface $events){
        foreach ($this->listeners as $index => $listener){
            if($events->detach($listener)){
                unset($this->listeners[$index]);
            }
        }
    }
    
    public function onDispatch(MvcEvent $e){
        
        $acl = new Acl();
        
        $acl->addRole(new Role('operativo'))
            ->addRole(new Role('gerencial'))
            ->addRole(new Role('admin'));
        
        $acl->addResource(new Resource('empresas:index'))
        ->addResource(new Resource('empresas:add'))
        ->addResource(new Resource('empresas:empresas'))
        ->addResource(new Resource('application:login'))
        ->addResource(new Resource('application:index'))
        ->addResource(new Resource('usuarios'))        
        ->allow('admin', 'application:login')
        ->allow('admin', 'application:index')
        ->allow('admin', 'empresas:index')
        ->allow('admin', 'empresas:empresas') 
        ->allow('admin', 'empresas:add')    
        ->allow('admin', 'usuarios')            
        ->allow('admin');
        
        
        $application = $e->getApplication();
        $services = $application->getServiceManager();
        $services->setService('AclService', $acl);
        
        $matches = $e->getRouteMatch();
        
        $controllerClass = $matches->getParam('controller');
        $controllerArray = explode("\\", $controllerClass);
        
        $module = strtolower($controllerArray[0]);
        $controller = strtolower($controllerArray[2]);
        $action = $matches->getParam('action');
        
        $resourceName = $module . ':' . $controller;
        
        if(!$acl->isAllowed($this->getRole($services), $resourceName, $action)){
            $matches->setParam('controller', 'Application\Controller\Error');
			$matches->setParam('action','denied');
        }
    }
    
    private function getRole($sm){
        $auth = $sm->get('Application\Model\Login');
        $role = 'admin';
        
        if($auth->isLoggedIn()){
            if(!empty($auth->getIdentity()->usu_role)){
                $role = $auth->getIdentity()->usu_role;
            } else {
                $auth->getIdentity()->usu_role = 'admin';
                $role = $auth->getIdentity()->usu_role;
            }
        }
        return $role;
    }
    
}