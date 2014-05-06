<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Empresas\Model\Entity\TipoTelefono;

class TipoTelefonoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($tip_tel_id){
    
    	$tip_tel_id = (int) $tip_tel_id;
    
    	$resultSet = $this->tableGateway->select(array('TIP_TEL_ID' => $tip_tel_id));
    	$row =  $resultSet->current();
    	 
    	if(!$row){
    		throw new \Exception('No se encontro el ID del tipo de teléfono');
    	}
    	 
    	return $row;
    }
    
    public function getTipoTelefonoSelect()
    {
         $resultSet= $this->tableGateway->select();
         $result=array();
         foreach($resultSet as $tipoTelefono){
            $result[$tipoTelefono->getTip_tel_id()]=$tipoTelefono->getTip_tel_descripcion();
         }
         return $result;
    }
}