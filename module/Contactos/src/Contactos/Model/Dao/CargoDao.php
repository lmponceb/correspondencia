<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\Cargo;

class CargoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traerTodosArreglo(){
    	
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	
    	$cargos = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$cargo = new Cargo();
    		$cargo->exchangeArray($row);
    		$cargos->append($cargo);
    	}
    	
    	foreach ($cargos as $emp){
    		$result[$emp->getCar_id()] = $emp->getCar_descripcion_es();
    	}
    	 
    	return $result;
    }
    
}