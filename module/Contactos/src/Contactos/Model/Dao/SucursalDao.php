<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\Sucursal;

class SucursalDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($suc_id){
    	
    	$suc_id = (int) $suc_id;
    	
    	$resultSet = $this->tableGateway->select(array('SUC_ID' => $suc_id));
    	$row =  $resultSet->current();
    	
    	if(!$row){
    		throw new \Exception('No se encontro el ID de la sucursal');
    	}
    	
    	return $row;
    }
    
    public function traerTodosArreglo(){
    	
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	
    	$sucursales = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$sucursal = new Sucursal();
    		$sucursal->exchangeArray($row);
    		$sucursales->append($sucursal);
    	}
    	
    	foreach ($sucursales as $suc){
    		$result[$suc->getSuc_id()] = $suc->getSuc_nombre();
    	}
    	 
    	return $result;
    }
    
    public function getSucursalesPorEmpresa($empresa){
    	
    	$empresa = (int) $empresa;
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('EMP_ID' => $empresa));
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$sucursales = new \ArrayObject();
    	$result = array();
    	
    	
    	 
    	foreach ($results as $row){
    		$sucursal = new Sucursal();
    		$sucursal->exchangeArray($row);
    		$sucursales->append($sucursal);
    	}
    	 
    	foreach ($sucursales as $suc){
    		$result[$suc->getSuc_id()] = $suc->getSuc_nombre();
    	}
    
    	return $result;
    }
    
}