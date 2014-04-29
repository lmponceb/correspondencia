<?php
namespace Empresas\Model\Dao;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Zend\Db\Sql\Expression;
use Empresas\Model\Entity\DetalleContacto;

class DetalleContactoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	$resultSet = $this->tableGateway->select();
         return $resultSet;
    }
    
    public function traer($det_con_id){
    
    	$det_con_id = (int) $det_con_id;
    
    	$resultSet = $this->tableGateway->select(array('DET_CON_ID' => $det_con_id));
    	$row =  $resultSet->current();
    	 
    	if(!$row){
    		throw new \Exception('No se encontro el ID del Detalle de Contacto');
    	}
    	 
    	return $row;
    }
    
    public function guardar(DetalleContacto $detalleContacto){

        $data=array(
            'det_con_id'=>$detalleContacto->getDet_con_id(),
            'emp_id'=>$detalleContacto->getEmp_id(),
            'con_id'=>$detalleContacto->getCon_id(),
            'suc_id'=>$detalleContacto->getSuc_id(),
            'tip_tel_id'=>$detalleContacto->getTip_tel_id(),
            'det_con_codigo_pais'=>$detalleContacto->getDet_con_codigo_pais(),
            'det_con_codigo_ciudad'=>$detalleContacto->getDet_con_codigo_ciudad(),
            'det_con_valor'=>$detalleContacto->getDet_con_valor(),
            'det_con_extension'=>$detalleContacto->getDet_con_extension()
        );

        

        if(empty($data['det_con_id']) || is_null($data['det_con_id'])){
            $data['det_con_id'] = new Sql\Expression('s_detalle_contacto.nextVal');
            $data=array_change_key_case($data,CASE_UPPER);

            $this->tableGateway->insert($data);
        }
     }
    
}