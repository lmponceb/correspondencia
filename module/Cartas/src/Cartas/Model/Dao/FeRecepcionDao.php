<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Cartas\Model\Entity\FeRecepcion;
use Zend\Db\Sql;

class FeRecepcionDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	//$select->join ( 'EMPRESA_INTERNA', 'EMPRESA_INTERNA.EMP_INT_ID  = CARTA.EMP_INT_ID' );
    	//$select->join ( 'TIPO_CARTA', 'TIPO_CARTA.TIP_CAR_ID  = CARTA.TIP_CAR_ID' );
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
        return $resultSet;
    }
    
    public function traerEmpresaInterna($id){
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'EMPRESA_INTERNA', 'EMPRESA_INTERNA.EMP_INT_ID  = FE_RECEPCION.EMP_INT_ID' );
    	//$select->join ( 'TIPO_CARTA', 'TIPO_CARTA.TIP_CAR_ID  = CARTA.TIP_CAR_ID' );
    	$select->where(array('FE_REC_ID' => $id));
    	 
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	return $resultSet;
    }
   
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('FE_REC_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
   
    public function guardar(FeRecepcion $fe_recepcion){
    	date_default_timezone_set('America/Guayaquil');
    	 
    	$id = (int) $fe_recepcion->getFe_rec_id();
    	 
    	$data = array(
    			'US_CODIGO' => $fe_recepcion->getUs_codigo(),
    			'FE_REC_TIPO' => $fe_recepcion->getFe_rec_tipo(),
    			'FE_REC_IDIOMA' => $fe_recepcion->getFe_rec_idioma(),
    			'FE_REC_FECHA' => date('d-M-Y'),
    			'FE_REC_RESPONSABLE' => $fe_recepcion->getFe_rec_responsable(),
    			'FE_REC_DESCRIPCION' => $fe_recepcion->getFe_rec_descripcion(),
    			'FE_REC_COMPANIA' => $fe_recepcion->getFe_rec_compania(),
    			'FE_REC_OFERENTE' => $fe_recepcion->getFe_rec_oferente(),
    			'FE_REC_OFERTA_NOMBRE' => $fe_recepcion->getFe_rec_oferta_nombre(),
    			'FE_REC_OFERTA_CODIGO' => $fe_recepcion->getFe_rec_oferta_codigo(),
    			'FE_REC_FECHA_HORA' => $fe_recepcion->getFe_rec_fecha_hora(),
    			'FE_REC_FECHA_MINUTO' => $fe_recepcion->getFe_rec_fecha_minuto(),
    			'FE_REC_FECHA_ANIO' => $fe_recepcion->getFe_rec_fecha_anio(),
    			'FE_REC_FECHA_MES' => $fe_recepcion->getFe_rec_fecha_mes(),
    			'FE_REC_FECHA_DIA' => $fe_recepcion->getFe_rec_fecha_dia(),
    			'FE_REC_SOBRE' => $fe_recepcion->getFe_rec_sobre(),
    			'FE_REC_ESTADO' => $fe_recepcion->getFe_rec_estado(),
    			'EMP_INT_ID' => $fe_recepcion->getEmp_int_id()
    	);
    	 
    	if(empty($id) || is_null($id)){
    		$data['FE_REC_ID'] = new Sql\Expression('s_fe_recepcion.nextVal');
    		$this->tableGateway->insert($data);
    			
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('FE_REC_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
    
    public function duplicar(FeRecepcion $fe_recepcion){
    	date_default_timezone_set('America/Guayaquil');
    
    	$id = (int) $fe_recepcion->getFe_rec_id();
    
    	$data = array(
    			'US_CODIGO' =>  $_SESSION['Zend_Auth']['storage']->us_codigo,
    			'FE_REC_TIPO' => $fe_recepcion->getFe_rec_tipo(),
    			'FE_REC_IDIOMA' => $fe_recepcion->getFe_rec_idioma(),
    			'FE_REC_FECHA' => date('d-M-Y'),
    			'FE_REC_RESPONSABLE' => $fe_recepcion->getFe_rec_responsable(),
    			'FE_REC_DESCRIPCION' => $fe_recepcion->getFe_rec_descripcion(),
    			'FE_REC_COMPANIA' => $fe_recepcion->getFe_rec_compania(),
    			'FE_REC_OFERENTE' => $fe_recepcion->getFe_rec_oferente(),
    			'FE_REC_OFERTA_NOMBRE' => $fe_recepcion->getFe_rec_oferta_nombre(),
    			'FE_REC_OFERTA_CODIGO' => $fe_recepcion->getFe_rec_oferta_codigo(),
    			'FE_REC_FECHA_HORA' => $fe_recepcion->getFe_rec_fecha_hora(),
    			'FE_REC_FECHA_MINUTO' => $fe_recepcion->getFe_rec_fecha_minuto(),
    			'FE_REC_FECHA_ANIO' => $fe_recepcion->getFe_rec_fecha_anio(),
    			'FE_REC_FECHA_MES' => $fe_recepcion->getFe_rec_fecha_mes(),
    			'FE_REC_FECHA_DIA' => $fe_recepcion->getFe_rec_fecha_dia(),
    			'FE_REC_SOBRE' => $fe_recepcion->getFe_rec_sobre(),
    			'FE_REC_ESTADO' => 'B',
    			'EMP_INT_ID' => $fe_recepcion->getEmp_int_id()
    	);
    	
    	
    	
    	$data['FE_REC_ID'] = new Sql\Expression('s_fe_recepcion.nextVal');
    	$this->tableGateway->insert($data);

    	/* 
    	$adapter=$this->tableGateway->getAdapter();
    	$query ="SELECT s_carta.currVal FROM CARTA";
    	$statement = $adapter->query ( $query );
    	$results =  $statement->execute ();
    	 
    	return $results; */
    }
   
	public function procesar($id, $role, $anio, $empresa_interna){
		
		$data['FE_REC_ESTADO'] = 'P';
		//$data['FE_REC_OFERTA_CODIGO'] = $empresa_interna . '-' . $role . '-' . $anio . '-' . $id;

		if($this->traer($id)){
			$this->tableGateway->update($data, array('FE_REC_ID' => $id ));
				
		}else{
			throw new \Exception( 'No se encontro el id para actualizar' );
		}
	} 
}