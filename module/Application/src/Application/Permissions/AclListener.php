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
        
        $acl->addRole(new Role('O'))
            ->addRole(new Role('G'))
            ->addRole(new Role('A'));
        
        $acl->addResource(new Resource('empresas:empresas'))
        ->addResource(new Resource('application:login'))
        ->addResource(new Resource('application:error'))
        ->addResource(new Resource('contactos:index'))
        ->addResource(new Resource('cartas:cartas'))
        ->allow('A', 'application:login')
        ->allow('A', 'application:error')
        ->allow('A', 'empresas:empresas')
        ->allow('A', 'contactos:index')
        ->allow('A', 'cartas:cartas')
        
        ->allow('G', 'application:login')
        ->allow('G', 'application:error')
        ->allow('G', 'empresas:empresas')
        ->allow('G', 'contactos:index')
        ->allow('G', 'cartas:cartas')
        
        ->allow('O', 'application:login')
        ->allow('O', 'application:error')
        ->allow('O', 'empresas:empresas')
        ->allow('O', 'contactos:index')
        ->allow('O', 'cartas:cartas');
        
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
        $role = 'A';
        
        if($auth->isLoggedIn()){
            if(!empty($auth->getIdentity()->usu_role)){
                $role = $auth->getIdentity()->usu_role;
            } else {
                $auth->getIdentity()->usu_role = 'A';
                $role = $auth->getIdentity()->usu_role;
            }
        }
        return $role;
    }
    
}