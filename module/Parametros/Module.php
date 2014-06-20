<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Parametros;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Parametros\Model\Dao\PaisDao;
use Parametros\Model\Entity\Pais;
use Parametros\Model\Dao\CiudadDao;
use Parametros\Model\Entity\Ciudad;
use Parametros\Model\Dao\EstadoDao;
use Parametros\Model\Entity\Estado;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig(){
    	return array(
    			'factories' => array(
    					'Parametros\Model\Dao\PaisDao' => function($sm){
    						$tableGateway = $sm->get('PaisTableGateway');
    						return new PaisDao($tableGateway);
    					},
    					'PaisTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Pais());
    						return new TableGateway('PAIS', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Parametros\Model\Dao\CiudadDao' => function($sm){
    						$tableGateway = $sm->get('CiudadTableGateway');
    						return new CiudadDao($tableGateway);
    					},
    					'CiudadTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Ciudad());
    						return new TableGateway('CIUDAD', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Parametros\Model\Dao\EstadoDao' => function($sm){
    						$tableGateway = $sm->get('EstadoTableGateway');
    						return new EstadoDao($tableGateway);
    					},
    					'EstadoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Estado());
    						return new TableGateway('ESTADO', $dbAdapter, null, $resultSetPrototype);
    					},
    
    			),
    	);
    }

    public function onBootstrap(MvcEvent $e){}
}
