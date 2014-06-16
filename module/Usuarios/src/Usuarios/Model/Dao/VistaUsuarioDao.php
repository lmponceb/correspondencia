<?php
 
 namespace Usuarios\Model\Dao;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Sql;

 class VistaUsuarioDao
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function traerTodos()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getUsuariosSelect()
     {
         $resultSet= $this->tableGateway->select();
         $result=array();
         foreach($resultSet as $usuario){
            $result[$usuario->getUs_codigo()]=$usuario->getUs_nombre();
         }
         return $result;
     }
 }