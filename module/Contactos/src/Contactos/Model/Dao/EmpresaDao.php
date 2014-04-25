<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\Empresa;

class EmpresaDao {
	
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