<?php
namespace Parametros\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Parametros\Model\Entity\Estado;

class EstadoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
         
         $select = $this->tableGateway->getSql ()->select ();
         $select->join ( 'PAIS', 'PAIS.PAI_ID  = ESTADO.PAI_ID' );
         $resultSet = $this->tableGateway->selectWith ( $select );
         return $resultSet;
    }
    
    public function traer($est_id){
    
    	$est_id = (int) $est_id;
    
    	$resultSet = $this->tableGateway->select(array('EST_ID' => $est_id));
    	$row =  $resultSet->current();
    
    	if(!$row){
    		throw new \Exception('No se encontro el ID de la estado');
    	}
    
    	return $row;
    }
    
    public function guardar(Estado $estado){
    	date_default_timezone_set('America/Guayaquil');
    
    	$id = (int) $estado->getEst_id();
    
    	$data = array(
    			'PAI_ID' => $estado->getPai_id(),
    			'EST_NOMBRE' => $estado->getEst_nombre()
    	);
    
    	if(empty($id) || is_null($id)){
    		$data['EST_ID'] = new Expression('s_estado.nextVal');
    		$this->tableGateway->insert($data);
    
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('EST_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
    
    public function eliminar($id){
    	$this->tableGateway->delete(array('EST_ID' => $id));
    }
    
    public function traerTodosArreglo(){
    	
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	
    	$estados = new \ArrayObject();
    	$result = array();
    	
    	foreach ($results as $row){
    		$estado = new Estado();
    		$estado->exchangeArray($row);
    		$estados->append($estado);
    	}
    	
    	foreach ($estados as $est){
    		$result[$est->getEst_id()] = $est->getEst_nombre();
    	}
    	 
    	return $result;
    }
    
}