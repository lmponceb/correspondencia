<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Empresas\Model\Entity\TipoTelefono;

class TipoContactoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($tip_con_id){
    
    	$tip_con_id = (int) $tip_con_id;
    
    	$resultSet = $this->tableGateway->select(array('TIP_CON_ID' => $tip_con_id));
    	$row =  $resultSet->current();
    	 
    	if(!$row){
    		throw new \Exception('No se encontro el ID del tipo contacto');
    	}
    	 
    	return $row;
    }
    
    public function getTipoContactoSelect()
    {
         $resultSet= $this->tableGateway->select();
         $result=array();
         foreach($resultSet as $tipoContacto){
            $result[$tipoContacto->getTip_con_id()]=$tipoContacto->getTip_con_descripcion();
         }
         return $result;
    }
}