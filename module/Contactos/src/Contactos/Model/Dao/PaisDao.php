<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\Pais;

class PaisDao {
	
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
    	 
    	$paises = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$pais = new Pais();
    		$pais->exchangeArray($row);
    		$paises->append($pais);
    	}
    	 
    	foreach ($paises as $emp){
    		$result[$emp->getPai_id()] = $emp->getPai_nombre();
    	}
    
    	return $result;
    }
}