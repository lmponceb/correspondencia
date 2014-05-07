<?php
 
 namespace Empresas\Model\Dao;
 use Zend\Db\TableGateway\AbstractTableGateway;
 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Sql;
 use Zend\Db\Sql\Expression;
 use Empresas\Model\Entity\Empresas;
 use Empresas\Model\Entity\DetalleContacto;

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

     public function traerPorId($emp_id)
     {
         $emp_id  = (int) $emp_id;

         $sql = new Sql($this->tableGateway->getAdapter());
         $select = $sql->select();
         $select->from('EMPRESA');
         $select->join(array('C' => 'CIUDAD'),'C.CIU_ID = EMPRESA.CIU_ID');
         $select->join(array('E' => 'ESTADO'),'E.EST_ID = C.EST_ID');
         $select->join(array('P' => 'PAIS'),'E.PAI_ID = P.PAI_ID');
         $select->join(array('EMP' => 'EMPRESA'),'EMP.EMP_ID = EMPRESA.EMP_EMP_ID',array('EMP_EMP_ID_AUTOCOMPLETAR'=>'EMP_NOMBRE'),'left');                  
         $select->where(array('EMPRESA.EMP_ID' => $emp_id));

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();
        $row=$results->current();

        $empresa=new Empresas();
        $empresa->exchangeArray($row);
        $empresa->pai_id=$row['PAI_ID'];
        $empresa->est_id=$row['EST_ID'];
        $empresa->emp_emp_id_autocompletar=$row['EMP_EMP_ID_AUTOCOMPLETAR'];    
        return $empresa;
     }

    public function getCodigoCiudadPorCodigoPais($det_con_codigo_pais){
        $sql=new Sql($this->tableGateway->getAdapter());
        $select=$sql->select();
        $select->from('PAIS');
        $select->join(array('E' => 'ESTADO'),'E.PAI_ID = PAIS.PAI_ID');
        $select->join(array('C' => 'CIUDAD'),'C.EST_ID = E.EST_ID');
        $select->where(array('PAIS.PAI_CODIGO_TELEFONO'=>$det_con_codigo_pais));
        $select->order('C.CIU_NOMBRE DESC');
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $ciudades=array();
        foreach($results as $row){
            $ciudades[$row['CIU_CODIGO_TELEFONO']]=$row['CIU_CODIGO_TELEFONO'].'-'.$row['CIU_NOMBRE'];
        }
        return $ciudades;

    }

    public function traerListadoJsonPorNombre($term,$emp_id=null){
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->from($this->tableGateway->table);
        $select->where->expression('UPPER(EMP_NOMBRE) LIKE UPPER(?)','%'.$term.'%'); //espera 2 parametros
        $select->where->literal('(EMP_EMP_ID IS NULL OR EMP_EMP_ID = 0)');
        if($emp_id != '' && !is_null($emp_id)){
            $select->where->notEqualTo('EMP_ID',$emp_id);
        }
        
        //echo $sql->getSqlStringForSqlObject($select);

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
    
        $result = array();
         
        foreach ($results as $row){
            $result[$row['EMP_ID']]['label']=$row['EMP_NOMBRE'];
            $result[$row['EMP_ID']]['value']=$row['EMP_NOMBRE'];
            $result[$row['EMP_ID']]['id']=$row['EMP_ID'];
        }

        return json_encode($result);

    }

     public function guardar(Empresas $empresa){

        $data=array(
            'emp_id'=>(int)$empresa->getEmp_id(),
            'emp_emp_id'=>(int)$empresa->getEmp_emp_id(),
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
            $data['emp_id'] = new \Zend\Db\Sql\Expression('s_empresa.nextVal');
            $data=array_change_key_case($data,CASE_UPPER);
            $this->tableGateway->insert($data);
            
        }else{
            $data=array_change_key_case($data,CASE_UPPER);
            $this->tableGateway->update($data,array('EMP_ID' => $data['EMP_ID']));
        }
     }
 }