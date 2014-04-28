<?php
namespace Empresas\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Empresas\Model\Entity\Ciudad;

class CiudadDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($ciu_id){
    	 
    	$ciu_id = (int) $ciu_id;
    	 
    	$resultSet = $this->tableGateway->select(array('CIU_ID' => $ciu_id));
    	$row =  $resultSet->current();
    	
    	if(!$row){
    		throw new \Exception('No se encontro el ID de la ciudad');
    	}
    	
    	return $row;
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
    
    public function getCiudadesPorEstado($estado){
    	
    	$estado = (int) $estado;
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('EST_ID' => $estado));
    	
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
    
    public function getCodigoTelefonoCiudad($ciudad){
    	$resultSet = $this->tableGateway->select(array('CIU_ID' => $ciudad));
    	$row = $resultSet->current();
    	return $row;
    }
    
}