<?php
namespace Parametros\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Parametros\Model\Entity\Ciudad;

class CiudadDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
         $select = $this->tableGateway->getSql ()->select ();
         $select->join ( 'ESTADO', 'ESTADO.EST_ID  = CIUDAD.EST_ID' );
         $resultSet = $this->tableGateway->selectWith ( $select );
         return $resultSet;
         
         
    }
    
    public function traer($ciu_id){
    	 
    	$ciu_id = (int) $ciu_id;
    	 
    	$resultSet = $this->tableGateway->select(array('CIU_ID' => $ciu_id));
    	$row =  $resultSet->current();
    	
    	if(!$row){
    		throw new \Exception('No se encontro el ID de la ciudad');
    	}
    	
    	return $row;
    }
    
    public function guardar(Ciudad $ciudad){
    	date_default_timezone_set('America/Guayaquil');
    
    	$id = (int) $ciudad->getCiu_id();
    
    	$data = array(
    			'EST_ID' => $ciudad->getEst_id(),
    			'CIU_NOMBRE' => $ciudad->getCiu_nombre(),
    			'CIU_CODIGO_TELEFONO' => $ciudad->getCiu_codigo_telefono()
    	);
    
    	if(empty($id) || is_null($id)){
    		$data['CIU_ID'] = new Expression('s_ciudad.nextVal');
    		$this->tableGateway->insert($data);
    
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('CIU_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
    
    public function eliminar($id){
    	$this->tableGateway->delete(array('CIU_ID' => $id));
    }
    
    /* 
    public function traerTodosArreglo(){
    	
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	
    	$ciudades = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$ciudad = new Ciudad();
    		$ciudad->exchangeArray($row);
    		$ciudades->append($ciudad);
    	}
    	
    	foreach ($ciudades as $ciu){
    		$result[$ciu->getCiu_id()] = $ciu->getCiu_nombre();
    	}
    	 
    	return $result;
    }
    
    public function getCiudadesPorEstado($estado){
    	
    	$estado = (int) $estado;
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('EST_ID' => $estado));
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$ciudades = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$ciudad = new Ciudad();
    		$ciudad->exchangeArray($row);
    		$ciudades->append($ciudad);
    	}
    	 
    	foreach ($ciudades as $ciu){
    		$result[$ciu->getCiu_id()] = $ciu->getCiu_nombre();
    	}
    
    	return $result;
    }
    
    public function getCodigoTelefonoCiudad($ciudad){
    	$resultSet = $this->tableGateway->select(array('CIU_ID' => $ciudad));
    	$row = $resultSet->current();
    	return $row;
    }    
    
    public function getCodigoCiudadPorCodigoPais($det_con_codigo_pais){
    	$sql=new Sql($this->tableGateway->getAdapter());
    	$select=$sql->select();
    	$select->from('PAIS');
    	$select->join(array('E' => 'ESTADO'),'E.PAI_ID = PAIS.PAI_ID');
    	$select->join(array('C' => 'CIUDAD'),'C.EST_ID = E.EST_ID');
    	$select->where(array('PAIS.PAI_CODIGO_TELEFONO'=>$det_con_codigo_pais));
    	$select->order('C.CIU_NOMBRE DESC');
    
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	$ciudades=array();
    	foreach($results as $row){
    		$ciudades[$row['CIU_CODIGO_TELEFONO']]=$row['CIU_CODIGO_TELEFONO'].'-'.$row['CIU_NOMBRE'];
    	}
    	return $ciudades;
    
    } */
}