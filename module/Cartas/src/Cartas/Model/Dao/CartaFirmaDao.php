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
    
    public function traerTodosPorCarta($id){
    	
    	$id = ( int ) $id;
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->where(array('CTR_ID' => $id));
    	$select->order(array('CAR_FIR_TIPO' => 'asc' ));
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	return $resultSet;
    	
    }
    
    public function traerTodosPorCartaEmpleado($id){
    
    	$id = ( int ) $id;
    
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'EMPLEADO', 'EMPLEADO.EPL_ID  = CARTA_FIRMA.EPL_ID' );
    	$select->where(array('CTR_ID' => $id));
    	 
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	return $resultSet;
    	
    	
    }
    
    public function eliminarPorCarta($ctr_id){
    	$this->tableGateway->delete(array('CTR_ID' => $ctr_id));
    }
    
    public function guardar(CartaFirma $carta){
    	
    	$data = array(
    			'CTR_ID' => $carta->getCtr_id(),
    			'EPL_ID' => $carta->getEpl_id(),
    			'CAR_FIR_TIPO' => $carta->getCar_fir_tipo()
    	);
    	
    	$data['CAR_FIR_ID'] = new Sql\Expression('s_carta_firma.nextVal');
    	$this->tableGateway->insert($data);
    }
    
    public function duplicar(CartaFirma $carta, $ctr_id){
    	 
    	$data = array(
    			'CTR_ID' => $ctr_id,
    			'EPL_ID' => $carta->getEpl_id(),
    			'CAR_FIR_TIPO' => $carta->getCar_fir_tipo()
    	);
    	 
    	$data['CAR_FIR_ID'] = new Sql\Expression('s_carta_firma.nextVal');
    	$this->tableGateway->insert($data);
    }
	
}