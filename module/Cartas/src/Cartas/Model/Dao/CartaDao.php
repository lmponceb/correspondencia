<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Cartas\Model\Entity\Carta;
use Zend\Db\Sql;

class CartaDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'EMPRESA_INTERNA', 'EMPRESA_INTERNA.EMP_INT_ID  = CARTA.EMP_INT_ID' );
    	$select->join ( 'TIPO_CARTA', 'TIPO_CARTA.TIP_CAR_ID  = CARTA.TIP_CAR_ID' );
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
        return $resultSet;
    }
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('CTR_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function guardar(Carta $carta){
    	date_default_timezone_set('America/Guayaquil');
    	 
    	$id = (int) $carta->getCtr_id();
    	 
    	$data = array(
    			//'CTR_ID' => (int) $carta->getCtr_id(),
    			'OBR_ID' => $carta->getObr_id(),
    			'EMP_INT_ID' => $carta->getEmp_int_id(),
    			'US_CODIGO' => $carta->getUs_codigo(),
    			'TIP_CAR_ID' => $carta->getTip_car_id(),
    			'CTR_IDIOMA' => $carta->getCtr_idioma(),
    			'CTR_FECHA_CREACION' => $carta->getCtr_fecha_creacion(),
    			'CTR_CUERPO' => $carta->getCtr_cuerpo(),
    			'CTR_CODIGO_FINAL' => $carta->getCtr_codigo_final(),
    			'CTR_FECHA_ACTUALIZACION' => date('d-M-Y'),
    			'CTR_REFERENCIA' => $carta->getCtr_referencia(),
    			'CTR_SALUDO' => $carta->getCtr_saludo(),
    			'CTR_DESPEDIDA' => $carta->getCtr_despedida(),
    			'CTR_TIPO' => $carta->getCtr_tipo(),
    			'CTR_ESTADO' => $carta->getCtr_estado()
    	);
    	 
    	if(empty($id) || is_null($id)){
    		$data['CTR_ID'] = new Sql\Expression('s_carta.nextVal');
    		$this->tableGateway->insert($data);
    			
    		$adapter=$this->tableGateway->getAdapter();
    		$query ="SELECT s_carta.currVal FROM CARTA";
    		$statement = $adapter->query ( $query );
    		$results =  $statement->execute ();
    			
    		return $results;
    
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('CTR_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
    /*

	public function cambiarEstado($id, $estado){
		
		$data['CON_ESTADO'] = strtoupper($estado);

		if($this->traer($id)){
			$this->tableGateway->update($data, array('CON_ID' => $id ));
				
		}else{
			throw new \Exception( 'No se encontro el id para eliminar' );
		}
	} */
	
}