<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Cartas\Model\Entity\Proyecto;

class ProyectoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	return $this->tableGateway->select ();
    }
    
    public function traer($id){
    	$id = (int) $id;
    	 
    	$rowset = $this->tableGateway->select(array('PRO_ID' => $id));
    	$row = $rowset->current();
    	return $row;
    }
    
    public function traerTodosArreglo(){
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	 
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$proyectos = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$proyecto = new Proyecto();
    		$proyecto->exchangeArray($row);
    		$proyectos->append($proyecto);
    	}
    	 
    	foreach ($proyectos as $pro){
    		$result[$pro->getPro_id()] = $pro->getPro_descripcion();
    	}
    
    	return $result;
    }
    	
}