<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Application\Model\Login;
use Application\Controller\LoginController;
use Application\Permissions\AclListener;
use Application\Model\Dao\RolUsuarioDao;
use Application\Model\Entity\RolUsuario;

class Module {
	public function onBootstrap(MvcEvent $e) {
		
		$eventManager = $e->getApplication ()->getEventManager ();
		$moduleRouteListener = new ModuleRouteListener ();
		$moduleRouteListener->attach ( $eventManager );
		
		$app = $e->getParam('application');
		$app->getEventManager()->attach('dispatch', array($this, 'initAuth'), 100);
		
		//$sm = $app->getServiceManager();
		//$sm->get('Application\Model\Dao\RolUsuarioDao');

		$aclListener = new AclListener();
		$aclListener->attach($eventManager);
		
		$eventManager->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
			$controller      = $e->getTarget();
			$controllerClass = get_class($controller);
			$moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
			$config          = $e->getApplication()->getServiceManager()->get('config');
			if (isset($config['module_layouts'][$moduleNamespace])) {
				$controller->layout($config['module_layouts'][$moduleNamespace]);
			}
		}, 100);
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
		
	}
	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}
	public function getAutoloaderConfig() {
		return array (
				'Zend\Loader\StandardAutoloader' => array (
						'namespaces' => array (
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__ 
						) 
				) 
		);
	}
	
	public function initAuth(MvcEvent $e){
		$application = $e->getApplication();
        $matches = $e->getRouteMatch();
        $controller = $matches->getParam('controller');
        $action = $matches->getParam('action');
		
		/* if(0 === strpos($controller, __NAMESPACE__, 0)){
            return;   
        } */
        
        if(0 === strpos($controller, __NAMESPACE__, 0)){
        	switch($controller){
        		case 'Application\Controller\Login':
        			if(in_array($action, array('index', 'autenticar'))){
        				return;
        			}
        			break;
        
        		case 'Application\Controller\Error':
        			return;
        			break;
        	}
        }
        
		$sm = $application->getServiceManager();
		$auth = $sm->get('Application\Model\Login');
		
		if(!$auth->isLoggedIn()){
			$matches->setParam('controller', 'Application\Controller\Login');
			$matches->setParam('action', 'index');
		}
		
	}
	
	public function getServiceConfig() {
		return array (
				'factories' => array (
						'Application\Model\Login' => function ($sm){
							$config = $sm->get ( 'config' );
							$db_auth = new \Zend\Db\Adapter\Adapter ( $config ['db'] );
							return new Login($db_auth);
						},

						'Application\Permissions\AclListener' => function ($sm){
							$config = $sm->get ( 'config' );
							$db_auth = new \Zend\Db\Adapter\Adapter ( $config ['db'] );
							return new AclListener($db_auth);
						},
		                'Application\Model\Dao\RolUsuarioDao' => function($sm){
		                    $tableGateway = $sm->get('RolUsuarioTableGateway');
		                    return new RolUsuarioDao($tableGateway);
		                },
		                'RolUsuarioTableGateway' => function ($sm){
		                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
		                    $resultSetPrototype = new ResultSet();
		                    $resultSetPrototype->setArrayObjectPrototype(new RolUsuario());
		                    return new TableGateway('ROL_USUARIO', $dbAdapter, null, $resultSetPrototype);
		                },
						
				),
		);
	}
	
	public function getControllerConfig(){
		return array(
				'factories' => array(
						'Application\Controller\Login' => function ($sm){
							$controller = new LoginController();
							$locator = $sm->getServiceLocator();
							$controller->setLogin($locator->get('Application\Model\Login'));
							return $controller;
						},
				)
		);
	}
}