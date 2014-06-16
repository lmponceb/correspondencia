<?php
namespace Empresas\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Empresas\Model\Entity\Estado;

class EstadoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
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
    
    public function getEstadosPorPais($pais){
    	
    	$pais = (int) $pais;
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('PAI_ID' => $pais));
    	
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

    public function getEstadosPorPaisSelect($pai_id){        
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->from($this->tableGateway->table);
        $select->join(array('P' => 'PAIS'),'ESTADO.PAI_ID = P.PAI_ID');
        $select->where(array('ESTADO.PAI_ID' => $pai_id));
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        
        $estados = new \ArrayObject();
        $result = array();
        
        foreach ($results as $row){
            $estado = new Estado();
            $estado->exchangeArray($row);
            $estados->append($estado);
        }
         
        foreach ($estados as $estado){
            $result[$estado->getEst_id()] = $estado->getEst_nombre();
        }
    
        return $result;
    }
    
}