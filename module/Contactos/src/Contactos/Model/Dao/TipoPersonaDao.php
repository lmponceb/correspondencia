<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\TipoPersona;

class TipoPersonaDao {
	
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
    	
    	$tipoPersonas = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$tipoPersona = new TipoPersona();
    		$tipoPersona->exchangeArray($row);
    		$tipoPersonas->append($tipoPersona);
    	}
    	
    	foreach ($tipoPersonas as $tip_per){
    		$result[$tip_per->getTip_per_id()] = $tip_per->getTip_per_descripcion_es();
    	}
    	 
    	return $result;
    }
    
    public function traerTodosArregloIngles(){
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	 
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$tipoPersonas = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$tipoPersona = new TipoPersona();
    		$tipoPersona->exchangeArray($row);
    		$tipoPersonas->append($tipoPersona);
    	}
    	 
    	foreach ($tipoPersonas as $tip_per){
    		$result[$tip_per->getTip_per_id()] = $tip_per->getTip_per_descripcion_en();
    	}
    
    	return $result;
    }
    
}