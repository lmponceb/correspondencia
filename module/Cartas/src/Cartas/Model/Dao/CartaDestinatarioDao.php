<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Cartas\Model\Entity\CartaDestinatario;

class CartaDestinatarioDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('CTR_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function guardar(CartaDestinatario $carta){
    	date_default_timezone_set('America/Guayaquil');
    	 
    	$data = array(
    			'CTR_ID' => $carta->getCtr_id(),
    			'CON_ID' => $carta->getCon_id(),
    			'CAR_DES_PRINCIPAL' => $carta->getCar_des_principal(),
    	);
    	 
    		$this->tableGateway->insert($data);
    }
	
}