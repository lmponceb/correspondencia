<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\Sucursal;
use Contactos\Model\Entity\Ciudad;

class CiudadDao {
	
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
    	
    	$ciudades = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$ciudad = new Ciudad();
    		$ciudad->exchangeArray($row);
    		$ciudades->append($ciudad);
    	}
    	
    	foreach ($ciudades as $ciu){
    		$result[$ciu->getCiu_id()] = $ciu->getCiu_nombre();
    	}
    	 
    	return $result;
    }
    
    public function getCiudadesPorPais($pais){
    	
    	$pais = (int) $pais;
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('EST_ID' => $pais));
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$ciudades = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$ciudad = new Sucursal();
    		$ciudad->exchangeArray($row);
    		$ciudades->append($ciudad);
    	}
    	 
    	foreach ($ciudades as $ciu){
    		$result[$ciu->getCiu_id()] = $ciu->getCiu_nombre();
    	}
    
    	return $result;
    }
    
}