<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Cartas\Model\Entity\Contacto;
use Zend\Db\Sql\Sql;

class ContactoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function getContactosPorSucursal($emp_id){
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	$select->where(array('EMP_ID' => $emp_id));
    	 
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$contactos = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$contacto = new Contacto();
    		$contacto->exchangeArray($row);
    		$contactos->append($contacto);
    	}
    	 
    	foreach ($contactos as $con){
    		$result[$con->getCon_id()] = $con->getCon_nombre() . ' ' . $con->getCon_apellido();
    	}
    
    	return $result;
    }
    
    public function getContactosPorEmpresa($emp_id){
    	
    	$adapter = $this->tableGateway->getAdapter();
    	$query = "
    			SELECT * FROM CONTACTO
WHERE CONTACTO.EMP_ID IN
(
SELECT EMP_ID 
FROM EMPRESA
WHERE EMPRESA.EMP_ID IN
(
 SELECT SUC.EMP_ID
 FROM EMPRESA \"SUC\"
 WHERE  SUC.EMP_EMP_ID = 1
)
)
    			";
    	
    	$statement = $adapter->query($query);
    	$results = $statement->execute();
    
    	$contactos = new \ArrayObject();
    	$result = array();
    
    	foreach ($results as $row){
    		$contacto = new Contacto();
    		$contacto->exchangeArray($row);
    		$contactos->append($contacto);
    	}
    
    	foreach ($contactos as $con){
    		$result[$con->getCon_id()] = $con->getCon_nombre() . ' ' . $con->getCon_apellido();
    	}
    
    	return $result;
    }
}