<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Cartas\Model\Entity\TransferenciaSueldo;
use Zend\Db\Sql;

class TransferenciaSueldoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$resultSet = $this->tableGateway->selectWith ( $select );
        return $resultSet;
    }
    
    public function traerTodosPorCarta($id){
    	 
    	$id = ( int ) $id;
    	 
    	$resultSet = $this->tableGateway->select(array('CTR_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('TRA_SUE_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function eliminarPorCarta($ctr_id){
    	
    	$this->tableGateway->delete(array('CTR_ID' => $ctr_id));
    	
    }
   
    public function guardar(TransferenciaSueldo $transferencia){
    	date_default_timezone_set('America/Guayaquil');
    	 
    	$id = (int) $transferencia->getTra_sue_id();
    	 
    	$data = array(
    			'CTR_ID' => $transferencia->getCtr_id(),
    			'TRA_SUE_VALOR_DEBITO' => $transferencia->getTra_sue_valor_debito(),
    			'TRA_SUE_NUMERO_CREDITOS' => $transferencia->getTra_sue_numero_creditos(),
    			'TRA_SUE_VALOR_MAXIMO' => $transferencia->getTra_sue_valor_maximo()
    	);
    	 
    	if(empty($id) || is_null($id)){
    		$data['TRA_SUE_ID'] = new Sql\Expression('s_transferencia_sueldo.nextVal');
    		$this->tableGateway->insert($data);
    			
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('TRA_SUE_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
    
    /* public function duplicar(TransaccionBancaria $transferencia, $ctr_id){
    	date_default_timezone_set('America/Guayaquil');
    
    	$data = array(
    			'TRA_BAN_BENEFICIARIO' => $transferencia->getTra_ban_beneficiario(),
    			'TRA_BAN_DIRECCION' => $transferencia->getTra_ban_direccion(),
    			'TRA_BAN_CUENTA' => $transferencia->getTra_ban_cuenta(),
    			'TRA_BAN_VALOR' => $transferencia->getTra_ban_valor(),
    			'TRA_BAN_ABA' => $transferencia->getTra_ban_aba(),
    			'TRA_BAN_BANCO' => $transferencia->getTra_ban_banco(),
    			'TRA_BAN_BANCO_LINEA_DOS' => $transferencia->getTra_ban_banco_linea_dos(),
    			'TRA_BAN_BANCO_DIRECCION' => $transferencia->getTra_ban_banco_direccion(),
    			'CTR_ID' => $ctr_id,
    	);
    	 
    	$data['TRA_BAN_ID'] = new Sql\Expression('s_transaccion_bancaria.nextVal');
    	$this->tableGateway->insert($data);
    } */
}