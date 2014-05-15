<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Where;
use Cartas\Model\Entity\Obra;

class ObraDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traer($id){
    	$id = (int) $id;
    	
    	$rowset = $this->tableGateway->select(array('OBR_ID' => $id));
    	$row = $rowset->current();
    	return $row;
    }
    
    public function getObrasPorProyecto($pro_id){
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('PRO_ID' => $pro_id));
    	 
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$obras = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$obra = new Obra();
    		$obra->exchangeArray($row);
    		$obras->append($obra);
    	}
    	 
    	foreach ($obras as $obr){
    		$result[$obr->getObr_id()] = $obr->getObr_descripcion();
    	}
    
    	return $result;
    }
    
}