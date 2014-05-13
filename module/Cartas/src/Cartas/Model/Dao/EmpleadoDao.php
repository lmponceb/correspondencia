<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Cartas\Model\Entity\Empleado;

class EmpleadoDao {
	
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
    	 
    	$empleados = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$empleado = new Empleado();
    		$empleado->exchangeArray($row);
    		$empleados->append($empleado);
    	}
    	 
    	foreach ($empleados as $emp){
    		$result[$emp->getEpl_id()] = $emp->getEpl_nombre(). ' '. $emp->getEpl_apellido();
    	}
    
    	return $result;
    }
}