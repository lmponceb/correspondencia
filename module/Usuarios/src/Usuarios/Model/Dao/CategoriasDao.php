<?php
 
 namespace Empresas\Model\Dao;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Sql;

 class CategoriasDao
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

     public function getCategoria($cat_emp_id)
     {
         $cat_emp_id  = (int) $cat_emp_id;
         $rowset = $this->tableGateway->select(array('cat_emp_id' => $cat_emp_id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $cat_emp_id");
         }
         return $row;
     }
     public function getCategoriasSelect()
     {
         $resultSet= $this->tableGateway->select();
         $result=array();
         foreach($resultSet as $categoria){
            $result[$categoria->cat_emp_id]=$categoria->cat_emp_descripcion;
         }
         return $result;
     }
 }