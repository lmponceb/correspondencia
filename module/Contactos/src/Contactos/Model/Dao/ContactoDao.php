<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;

class ContactoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('CON_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
   /*  public function traer($id) {
    	$id = ( int ) $id;
    
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'paciente', 'paciente.pac_id  = receta.pac_id' );
    	$select->where ( array (
    			'rec_id' => "$id"
    	) );
    
    	$resultSet = $this->tableGateway->selectWith ( $select );
    
    	$row = $resultSet->current ();
    	return $row;
    } */
}