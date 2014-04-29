<?php
namespace Empresas;
use Zend\Db\ResultSet\ResultSet;

use Empresas\Model\Dao\EmpresasDao;
use Empresas\Model\Entity\Empresas;

use Empresas\Model\Dao\CategoriasDao;
use Empresas\Model\Entity\Categorias;

use Empresas\Model\Dao\PaisDao;
use Empresas\Model\Entity\Pais;

use Empresas\Model\Dao\EstadoDao;
use Empresas\Model\Entity\Estado;

use Empresas\Model\Dao\CiudadDao;
use Empresas\Model\Entity\Ciudad;

use Empresas\Model\Dao\TipoTelefonoDao;
use Empresas\Model\Entity\TipoTelefono;

use Empresas\Model\Dao\DetalleContactoDao;
use Empresas\Model\Entity\DetalleContacto;

use Zend\Db\TableGateway\TableGateway;



class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Empresas\Model\Dao\EmpresasDao' =>  function($sm) {
                     $tableGateway = $sm->get('EmpresasTableGateway');
                     $table = new EmpresasDao($tableGateway);
                     return $table;
                 },
                 'EmpresasTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Empresas());
                     return new TableGateway('EMPRESA', $dbAdapter, null, $resultSetPrototype);
                 },

                'Empresas\Model\Dao\CategoriasDao' =>  function($sm) {
                     $tableGateway = $sm->get('CategoriasTableGateway');
                     $table = new CategoriasDao($tableGateway);
                     return $table;
                 },
                 'CategoriasTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Categorias());
                     return new TableGateway('CATEGORIA_EMPRESA', $dbAdapter, null, $resultSetPrototype);
                 },

                'Empresas\Model\Dao\PaisDao' => function($sm){
                    $tableGateway = $sm->get('PaisTableGateway');
                    return new PaisDao($tableGateway);
                },
                'PaisTableGateway' => function ($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Pais());
                    return new TableGateway('PAIS', $dbAdapter, null, $resultSetPrototype);
                },

                'Empresas\Model\Dao\EstadoDao' => function($sm){
                    $tableGateway = $sm->get('EstadoTableGateway');
                    return new EstadoDao($tableGateway);
                },
                'EstadoTableGateway' => function ($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Estado());
                    return new TableGateway('ESTADO', $dbAdapter, null, $resultSetPrototype);
                },

                'Empresas\Model\Dao\CiudadDao' => function($sm){
                    $tableGateway = $sm->get('CiudadTableGateway');
                    return new CiudadDao($tableGateway);
                },
                'CiudadTableGateway' => function ($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Ciudad());
                    return new TableGateway('CIUDAD', $dbAdapter, null, $resultSetPrototype);
                },

                'Empresas\Model\Dao\TipoTelefonoDao' => function($sm){
                    $tableGateway = $sm->get('TipoTelefonoTableGateway');
                    return new TipoTelefonoDao($tableGateway);
                },
                'TipoTelefonoTableGateway' => function ($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new TipoTelefono());
                    return new TableGateway('TIPO_TELEFONO', $dbAdapter, null, $resultSetPrototype);
                },

                'Empresas\Model\Dao\DetalleContactoDao' => function($sm){
                    $tableGateway = $sm->get('DetalleContactoTableGateway');
                    return new DetalleContactoDao($tableGateway);
                },
                'DetalleContactoTableGateway' => function ($sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new DetalleContacto());
                    return new TableGateway('DETALLE_CONTACTO', $dbAdapter, null, $resultSetPrototype);
                },
             ),
         );
     }
}
