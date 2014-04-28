<?php
 
 namespace Empresas\Model\Dao;
 use Zend\Db\TableGateway\AbstractTableGateway;
 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql;
 use Empresas\Model\Entity\Empresas;

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
     public function guardar(Empresas $empresa){

        $data=array(
            'emp_id'=>(int)$empresa->getEmp_id(),
            'cat_emp_id'=>(int)$empresa->getCat_emp_id(),
            'ciu_id'=>$empresa->getCiu_id(),
            'emp_nombre'=>$empresa->getEmp_nombre(),
            'emp_direccion'=>$empresa->getEmp_direccion(),
            'emp_referencia'=>$empresa->getEmp_referencia(),
            'emp_sector'=>$empresa->getEmp_sector(),
            'emp_email'=>$empresa->getEmp_email(),
            'emp_pagina_web'=>$empresa->getEmp_pagina_web(),
            'emp_fecha_actualizacion' => date('d/m/y'),
            'emp_usuario'=>1
        );

        

        if(empty($data['emp_id']) || is_null($data['emp_id'])){
            $data['emp_id'] = new Sql\Expression('s_empresa.nextVal');
            $data=array_change_key_case($data,CASE_UPPER);

            $this->tableGateway->insert($data);
        }
     }
 }