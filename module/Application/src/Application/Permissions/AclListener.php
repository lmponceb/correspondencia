<?php
namespace Application\Permissions;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;

class AclListener implements ListenerAggregateInterface{
    
    protected $listeners = array();
    protected $rolUsuarioDao;

    /*public function __construct($dbauth){
        print_r($dbauth);
    }*/
    
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


        $app = $e->getParam('application');
        $sm = $app->getServiceManager();
        $config = $sm->get('config');

        $db_auth = new \Zend\Db\Adapter\Adapter ( $config ['db'] );

         $sql = new Sql($db_auth);
         $selectRoles = $sql->select();
         $selectRoles->from('ROL');
         $selectRoles->join(array('RA' => 'ROL_APLICACION'),'ROL.ROL_ID = RA.ROL_ID');
         $selectRoles->join(array('A' => 'APLICACION'),'RA.APL_ID = A.APL_ID');
        $statement = $sql->prepareStatementForSqlObject($selectRoles);
        $results = $statement->execute();

        $acl = new Acl();
 
        $permissionsArray=array();

        foreach($results as $rol){
            $permissionsArray[$rol['ROL_ID']][$rol['APL_ID']]=$rol['APL_DESCRIPCION'];
        }

         $selectResource = $sql->select();
         $selectResource->from('APLICACION');
         $statement = $sql->prepareStatementForSqlObject($selectResource);
         $results = $statement->execute();

        foreach($results as $resource){
            $acl->addResource(new Resource($resource['APL_DESCRIPCION']));
        }

        foreach($permissionsArray as $rol_id=>$permission){
            $acl->addRole(new Role($rol_id));
            foreach($permission as $apl_id=>$resource){
                $acl->allow($rol_id, $resource);
            }            
        }


       /*$acl->addRole(new Role('A'))
        ->addRole(new Role('G'))
        ->addRole(new Role('O'))
        ->addResource(new Resource('parametros:index'))
        ->addResource(new Resource('empresas:empresas'))
        ->addResource(new Resource('application:login'))
        ->addResource(new Resource('application:index'))
        ->addResource(new Resource('application:error'))
        ->addResource(new Resource('contactos:index'))
        ->addResource(new Resource('cartas:cartas'))
        ->addResource(new Resource('parametros:pais'))
        ->addResource(new Resource('parametros:estado'))
        ->addResource(new Resource('parametros:ciudad'))
        ->allow('A', 'application:index')
        ->allow('A', 'application:login')
        ->allow('A', 'application:error')
        ->allow('A', 'empresas:empresas')
        ->allow('A', 'contactos:index')
        ->allow('A', 'cartas:cartas')
        ->allow('A', 'parametros:index')
        ->allow('A', 'parametros:pais')
        ->allow('A', 'parametros:estado')
        ->allow('A', 'parametros:ciudad')
        
        ->allow('G', 'application:login')
        ->allow('G', 'application:error')
        ->allow('G', 'empresas:empresas')
        ->allow('G', 'contactos:index')
        ->allow('G', 'cartas:cartas')
        ->allow('G', 'parametros:index')
        
        ->allow('O', 'application:login')
        ->allow('O', 'application:error')
        ->allow('O', 'empresas:empresas')
        ->allow('O', 'contactos:index')
        ->allow('O', 'cartas:cartas')
        ->allow('O', 'parametros:index');*/
        
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
        $role = '1';
        
        if($auth->isLoggedIn()){
            if(!empty($auth->getIdentity()->us_role)){
                $role = $auth->getIdentity()->us_role;
            } else {
                $auth->getIdentity()->us_role = '1';
                $role = $auth->getIdentity()->us_role;
            }
        }
        return $role;
    }

    
    
}