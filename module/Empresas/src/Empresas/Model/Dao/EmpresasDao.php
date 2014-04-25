<?php
 
 namespace Empresas\Model\Dao;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Sql;

 class EmpresasDao
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

     public function getEmpresas($emp_id)
     {
         $emp_id  = (int) $emp_id;
         $rowset = $this->tableGateway->select(array('emp_id' => $emp_id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $emp_id");
         }
         return $row;
     }
 }