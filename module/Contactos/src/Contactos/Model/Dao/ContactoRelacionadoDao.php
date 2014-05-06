<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\Pais;
use Contactos\Model\Entity\ContactoRelacionado;

class ContactoRelacionadoDao {
	
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
    
    public function guardar(ContactoRelacionado $contactoRelacionado){
    
    	$data=array(
    			'TIP_CON_ID'=>$contactoRelacionado->getTip_con_id(),
    			'CON_ID'=>$contactoRelacionado->getCon_id(),
    			'CON_REL_VALOR'=>$contactoRelacionado->getCon_rel_valor()
    	);
    	
    	if(empty($data['CON_REL_ID']) || is_null($data['CON_REL_ID'])){
    		$data['CON_REL_ID'] = new \Zend\Db\Sql\Expression('s_detalle_contacto.nextVal');
    		//$data=array_change_key_case($data,CASE_UPPER);
    		$this->tableGateway->insert($data);
    	}
    }
       
}