<?php
namespace Empresas;
use Zend\Db\ResultSet\ResultSet;

use Empresas\Model\Dao\EmpresasDao;
use Empresas\Model\Entity\Empresas;

use Empresas\Model\Dao\CategoriasDao;
use Empresas\Model\Entity\Categorias;

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
             ),
         );
     }
}
