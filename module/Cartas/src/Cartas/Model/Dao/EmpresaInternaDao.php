<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Cartas\Model\Entity\EmpresaInterna;

class EmpresaInternaDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	return $this->tableGateway->select ();
    }
    
    public function traerTodosArreglo(){
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	 
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$empresaInterna = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$empresaInt = new EmpresaInterna();
    		$empresaInt->exchangeArray($row);
    		$empresaInterna->append($empresaInt);
    	}
    	 
    	foreach ($empresaInterna as $emp_int){
    		$result[$emp_int->getEmp_int_id()] = $emp_int->getEmp_int_nombre();
    	}
    
    	return $result;
    }
}