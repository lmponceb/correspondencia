<?php
namespace Parametros\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Parametros\Model\Entity\Pais;

class PaisDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($pai_id){
    
    	$pai_id = (int) $pai_id;
    
    	$resultSet = $this->tableGateway->select(array('PAI_ID' => $pai_id));
    	$row =  $resultSet->current();
    	 
    	if(!$row){
    		throw new \Exception('No se encontro el ID de la pais');
    	}
    	 
    	return $row;
    }
    
    public function guardar(Pais $pais){
    	date_default_timezone_set('America/Guayaquil');
    	 
    	$id = (int) $pais->getPai_id();
    	 
    	$data = array(
    			'PAI_NOMBRE' => $pais->getPai_nombre(),
    			'PAI_CODIGO_TELEFONO' => $pais->getPai_codigo_telefono()
    	);
    	 
    	if(empty($id) || is_null($id)){
    		$data['PAI_ID'] = new Expression('s_pais.nextVal');
    		$this->tableGateway->insert($data);
    
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('PAI_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
    
    public function eliminar($id){
    	$this->tableGateway->delete(array('PAI_ID' => $id));
    }
    
 	public function traerTodosArreglo(){
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	 
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$paises = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$pais = new Pais();
    		$pais->exchangeArray($row);
    		$paises->append($pais);
    	}
    	 
    	foreach ($paises as $pai){
    		$result[$pai->getPai_id()] = $pai->getPai_nombre();
    	}
    
    	return $result;
    }
    
}