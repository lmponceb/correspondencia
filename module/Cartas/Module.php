<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cartas;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Cartas\Model\Entity\Carta;
use Cartas\Model\Dao\CartaDao;
use Cartas\Model\Entity\TipoCarta;
use Cartas\Model\Dao\TipoCartaDao;
use Cartas\Model\Entity\EmpresaInterna;
use Cartas\Model\Dao\EmpresaInternaDao;
use Cartas\Model\Entity\Empresa;
use Cartas\Model\Dao\EmpresaDao;
use Cartas\Model\Entity\Empleado;
use Cartas\Model\Dao\EmpleadoDao;
use Cartas\Model\Entity\Proyecto;
use Cartas\Model\Dao\ProyectoDao;
use Cartas\Model\Entity\Contacto;
use Cartas\Model\Dao\ContactoDao;
use Cartas\Model\Entity\Obra;
use Cartas\Model\Dao\ObraDao;
use Cartas\Model\Dao\CartaDestinatarioDao;
use Cartas\Model\Entity\CartaDestinatario;
use Cartas\Model\Dao\CartaFirmaDao;
use Cartas\Model\Entity\CartaFirma;

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

    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
    
    public function getServiceConfig(){
    	return array(
    			'factories' => array(
    					'Cartas\Model\Dao\CartaDao' => function($sm){
    						$tableGateway = $sm->get('CartasTableGateway');
    						return new CartaDao($tableGateway);
    					},
    					'CartasTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Carta());
    						return new TableGateway('CARTA', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\TipoCartaDao' => function($sm){
    						$tableGateway = $sm->get('TipoCartaTableGateway');
    						return new TipoCartaDao($tableGateway);
    					},
    					'TipoCartaTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new TipoCarta());
    						return new TableGateway('TIPO_CARTA', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\EmpresaInternaDao' => function($sm){
    						$tableGateway = $sm->get('EmpresaInternaTableGateway');
    						return new EmpresaInternaDao($tableGateway);
    					},
    					'EmpresaInternaTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new EmpresaInterna());
    						return new TableGateway('EMPRESA_INTERNA', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\EmpresaDao' => function($sm){
    						$tableGateway = $sm->get('EmpresaTableGateway');
    						return new EmpresaDao($tableGateway);
    					},
    					'EmpresaTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Empresa());
    						return new TableGateway('EMPRESA', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\EmpleadoDao' => function($sm){
    						$tableGateway = $sm->get('EmpleadoTableGateway');
    						return new EmpleadoDao($tableGateway);
    					},
    					'EmpleadoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Empleado());
    						return new TableGateway('EMPLEADO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\ProyectoDao' => function($sm){
    						$tableGateway = $sm->get('ProyectoTableGateway');
    						return new ProyectoDao($tableGateway);
    					},
    					'ProyectoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Proyecto());
    						return new TableGateway('PROYECTO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\ContactoDao' => function($sm){
    						$tableGateway = $sm->get('ContactoCartasTableGateway');
    						return new ContactoDao($tableGateway);
    					},
    					'ContactoCartasTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Contacto());
    						return new TableGateway('CONTACTO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\ObraDao' => function($sm){
    						$tableGateway = $sm->get('ObraTableGateway');
    						return new ObraDao($tableGateway);
    					},
    					'ObraTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Obra());
    						return new TableGateway('OBRA', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\CartaDestinatarioDao' => function($sm){
    						$tableGateway = $sm->get('CartaDestinatarioTableGateway');
    						return new CartaDestinatarioDao($tableGateway);
    					},
    					'CartaDestinatarioTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new CartaDestinatario());
    						return new TableGateway('CARTA_DESTINATARIO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Cartas\Model\Dao\CartaFirmaDao' => function($sm){
    						$tableGateway = $sm->get('CartaFirmaTableGateway');
    						return new CartaFirmaDao($tableGateway);
    					},
    					'CartaFirmaTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new CartaFirma());
    						return new TableGateway('CARTA_FIRMA', $dbAdapter, null, $resultSetPrototype);
    					},
    					
    			),
    	);
    }
}
