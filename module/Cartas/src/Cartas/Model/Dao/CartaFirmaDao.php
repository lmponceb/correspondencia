<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Cartas\Model\Entity\CartaFirma;

class CartaFirmaDao {
	
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
    
    public function guardar(CartaFirma $carta){
    	
    	$data = array(
    			'CTR_ID' => $carta->getCtr_id(),
    			'EPL_ID' => $carta->getEpl_id()
    	);
    	
    	$data['CAR_FIR_ID'] = new Sql\Expression('s_carta_firma.nextVal');
    	$this->tableGateway->insert($data);
    }
	
}