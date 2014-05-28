<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\Empresa;
use Zend\Db\Sql\Where;

class EmpresaDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($id){
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'CIUDAD', 'CIUDAD.CIU_ID  = EMPRESA.CIU_ID' );
    	$select->join ( 'ESTADO', 'ESTADO.EST_ID  = CIUDAD.EST_ID' );
    	$select->join ( 'PAIS', 'PAIS.PAI_ID  = ESTADO.PAI_ID' );
    	$select->where(array('EMP_ID' => $id));
    	 
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function traerPadre($id){
    	$resultSet = $this->tableGateway->select(array('EMP_EMP_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function traerTodosArreglo(){
    	
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	
    	$empresas = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$empresa = new Empresa();
    		$empresa->exchangeArray($row);
    		$empresas->append($empresa);
    	}
    	
    	foreach ($empresas as $emp){
    		$result[$emp->getEmp_id()] = $emp->getEmp_nombre();
    	}
    	 
    	return $result;
    }
    
    public function traerEmpresas(){
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$where = new Where ();
    	$action = '';
		$where->expression ( "EMP_EMP_ID IS NULL OR EMP_EMP_ID = 0", null );
		$select->where ( $where );
    	 
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$empresas = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$empresa = new Empresa();
    		$empresa->exchangeArray($row);
    		$empresas->append($empresa);
    	}
    	 
    	foreach ($empresas as $emp){
    		$result[$emp->getEmp_id()] = $emp->getEmp_nombre();
    	}
    
    	return $result;
    }
    
    public function getSucursalesPorEmpresa($emp_id){
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('EMP_EMP_ID' => $emp_id));
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	
    	$empresas = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$empresa = new Empresa();
    		$empresa->exchangeArray($row);
    		$empresas->append($empresa);
    	}
    	
    	foreach ($empresas as $emp){
    		$result[$emp->getEmp_id()] = $emp->getEmp_nombre();
    	}
    	 
    	return $result;
    }
    
}