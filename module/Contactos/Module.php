<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Contactos;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Contactos\Model\Entity\Contacto;
use Contactos\Model\Entity\TipoPersona;
use Contactos\Model\Dao\ContactoDao;
use Contactos\Model\Dao\TipoPersonaDao;
use Contactos\Model\Entity\Empresa;
use Contactos\Model\Dao\EmpresaDao;
use Contactos\Model\Entity\Cargo;
use Contactos\Model\Dao\CargoDao;
use Contactos\Model\Dao\PaisDao;
use Contactos\Model\Entity\Pais;
use Contactos\Model\Entity\Sucursal;
use Contactos\Model\Dao\SucursalDao;
use Contactos\Model\Dao\CiudadDao;
use Contactos\Model\Entity\Ciudad;
use Contactos\Model\Entity\Estado;
use Contactos\Model\Dao\EstadoDao;
use Contactos\Model\Dao\TipoContactoDao;
use Contactos\Model\Entity\TipoContacto;
use Contactos\Model\Entity\DetalleContacto;
use Contactos\Model\Dao\DetalleContactoDao;
use Contactos\Model\Dao\ContactoRelacionadoDao;
use Contactos\Model\Entity\ContactoRelacionado;
use Application\Controller\Listener\LanguageListener;
use Cartas\Model\Dao\CartaDao;
use Cartas\Model\Entity\Carta;

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
    					'Contactos\Model\Dao\ContactoDao' => function($sm){
    						$tableGateway = $sm->get('ContactoContactosTableGateway');
    						return new ContactoDao($tableGateway);
    					},
    					'ContactoContactosTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Contacto());
    						return new TableGateway('CONTACTO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\TipoPersonaDao' => function($sm){
    						$tableGateway = $sm->get('TipoPersonaTableGateway');
    						return new TipoPersonaDao($tableGateway);
    					},
    					'TipoPersonaTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new TipoPersona());
    						return new TableGateway('TIPO_PERSONA', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\EmpresaDao' => function($sm){
    						$tableGateway = $sm->get('EmpresaTableGateway');
    						return new EmpresaDao($tableGateway);
    					},
    					'EmpresaTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Empresa());
    						return new TableGateway('EMPRESA', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\CargoDao' => function($sm){
    						$tableGateway = $sm->get('CargoTableGateway');
    						return new CargoDao($tableGateway);
    					},
    					'CargoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Cargo());
    						return new TableGateway('CARGO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\PaisDao' => function($sm){
    						$tableGateway = $sm->get('PaisTableGateway');
    						return new PaisDao($tableGateway);
    					},
    					'PaisTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Pais());
    						return new TableGateway('PAIS', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\SucursalDao' => function($sm){
    						$tableGateway = $sm->get('SucursalTableGateway');
    						return new SucursalDao($tableGateway);
    					},
    					'SucursalTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Sucursal());
    						return new TableGateway('SUCURSAL', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\CiudadDao' => function($sm){
    						$tableGateway = $sm->get('CiudadTableGateway');
    						return new CiudadDao($tableGateway);
    					},
    					'CiudadTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Ciudad());
    						return new TableGateway('CIUDAD', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\EstadoDao' => function($sm){
    						$tableGateway = $sm->get('EstadoTableGateway');
    						return new EstadoDao($tableGateway);
    					},
    					'EstadoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Estado());
    						return new TableGateway('ESTADO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\TipoContactoDao' => function($sm){
    						$tableGateway = $sm->get('TipoContactoTableGateway');
    						return new TipoContactoDao($tableGateway);
    					},
    					'TipoContactoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new TipoContacto());
    						return new TableGateway('TIPO_CONTACTO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\DetalleContactoDao' => function($sm){
    						$tableGateway = $sm->get('DetalleContactoTableGateway');
    						return new DetalleContactoDao($tableGateway);
    					},
    					'DetalleContactoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new DetalleContacto());
    						return new TableGateway('DETALLE_CONTACTO', $dbAdapter, null, $resultSetPrototype);
    					},
    					'Contactos\Model\Dao\ContactoRelacionadoDao' => function($sm){
    						$tableGateway = $sm->get('ContactoRelacionadoTableGateway');
    						return new ContactoRelacionadoDao($tableGateway);
    					},
    					'ContactoRelacionadoTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new ContactoRelacionado());
    						return new TableGateway('CONTACTO_RELACIONADO', $dbAdapter, null, $resultSetPrototype);
    					},
    					
    					'Contactos\Model\Dao\CartasDao' => function($sm){
    						$tableGateway = $sm->get('CartasConTableGateway');
    						return new CartaDao($tableGateway);
    					},
    					'CartasConTableGateway' => function ($sm){
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Carta());
    						return new TableGateway('CARTA', $dbAdapter, null, $resultSetPrototype);
    					},
    
    			),
    	);
    }
    
}