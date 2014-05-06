<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
//use Zend\Db\Sql\Sql;
use Contactos\Model\Entity\Contacto;
use Zend\Db\Sql;



class ContactoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'CARGO', 'CARGO.CAR_ID  = CONTACTO.CAR_ID' );
    	$select->join ( 'CIUDAD', 'CIUDAD.CIU_ID  = CONTACTO.CIU_ID' );
    	$select->join ( 'ESTADO', 'ESTADO.EST_ID  = CIUDAD.EST_ID' );
    	$select->join ( 'PAIS', 'PAIS.PAI_ID  = ESTADO.PAI_ID' );
    	$select->join ( 'TIPO_PERSONA', 'TIPO_PERSONA.TIP_PER_ID  = CONTACTO.TIP_PER_ID' );
    	$select->join ( 'EMPRESA', 'EMPRESA.EMP_ID  = CONTACTO.EMP_ID' );
    	$select->join (array('SUC' => 'EMPRESA'), 'SUC.EMP_ID  = EMPRESA.EMP_EMP_ID', array('SUC_NOMBRE' => 'EMP_NOMBRE'), 'left' );
    	
    	//echo $select->getSqlString();
    	//die();
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
        return $resultSet;
    }
    
    /*  public function traer($id) {
     $id = ( int ) $id;
    
    $select = $this->tableGateway->getSql ()->select ();
    $select->join ( 'paciente', 'paciente.pac_id  = receta.pac_id' );
    $select->where ( array (
    		'rec_id' => "$id"
    ) );
    
    $resultSet = $this->tableGateway->selectWith ( $select );
    
    $row = $resultSet->current ();
    return $row;
    } */
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('CON_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function guardar(Contacto $contacto){
    	date_default_timezone_set('America/Guayaquil');
    	
    	$id = (int) $contacto->getCon_id();
    	
    	$data = array(
    			'CAR_ID' => (int)  $contacto->getCar_id(),
    			'TIP_PER_ID' => (int)  $contacto->getTip_per_id(),
    			'CIU_ID' => (int) $contacto->getCiu_id(),
    			'CON_NOMBRE' => $contacto->getCon_nombre(),
    			'CON_APELLIDO' => $contacto->getCon_apellido(),
    			'CON_EMAIL' => $contacto->getCon_email(),
    			'CON_IDIOMA' => $contacto->getCon_idioma(),
    			'CON_USUARIO' => $contacto->getCon_usuario(),
    			//'CON_FECHA_ACTUALIZACION' => new Sql\Expression('to_date(\'27-APR-2001\', \'DD-MM-YYYY\')'),
    			'CON_FECHA_ACTUALIZACION' => date('d-M-Y'),
    			'CON_PRIVADO' => $contacto->getCon_privado(),
    			'CON_FECHA_NACIMIENTO_PERSONAL' => $contacto->getCon_fecha_nacimiento_personal(),
    			'CON_DIRECCION_DOMICILIO_PER' => $contacto->getCon_direccion_domicilio_per(),
    			'CON_EMAIL_PERSONAL' => $contacto->getCon_email_personal(),
    			'CON_CODIGO_PAIS' => $contacto->getCon_codigo_pais(),
    			'CON_CODIGO_CIUDAD' => $contacto->getCon_codigo_ciudad(),
    			'CON_TELEFONO_DOMICILIO_PER' => $contacto->getCon_telefono_domicilio_per(),
    			'CON_CELULAR_PERSONAL' => $contacto->getCon_celular_personal(),
    			'CON_OBSERVACIONES' => $contacto->getCon_observaciones(),
    			'EMP_ID' => $contacto->getEmp_id()
    	);
    	
    	/* echo '<pre>';
    	print_r($data);
    	echo '<pre>';
    	
    	die(); */
    	
    	/*
    	if($inscrito->getCat_codigo() !== null){
    		$data['cat_codigo'] = $inscrito->getCat_codigo()->getCat_codigo();
    	}
    	 
    	if($inscrito->getPai_codigo() !== null){
    		$data['pai_codigo'] = $inscrito->getPai_codigo()->getPai_codigo();
    	}
    	 
    	if($inscrito->getAct_codigo() !== null){
    		$data['act_codigo'] = $inscrito->getAct_codigo()->getAct_codigo();
    	}
    	 
    	if($inscrito->getIns_nacionalidad() !== null){
    		$data['ins_nacionalidad'] = $inscrito->getIns_nacionalidad()->getPai_codigo();
    	}
    	 
    	 if($inscrito->getCat_eve_codigo() !== null){
    	 $data['cat_eve_codigo'] = $inscrito->getCat_eve_codigo()->getCat_eve_codigo();
    	} */
 
    	
    	if(empty($id) || is_null($id)){
    		$data['CON_ID'] = new Sql\Expression('s_contacto.nextVal');
    		$this->tableGateway->insert($data);
			
			$adapter=$this->tableGateway->getAdapter();
			$query ="SELECT s_contacto.currVal FROM CONTACTO";
			$statement = $adapter->query ( $query );
			$results =  $statement->execute ();
			
			return $results;
    		
    		//$data['emp_id'] = new \Zend\Db\Sql\Expression('s_contacto.currVal');
    		//$this->tableGateway->insert($data);
    		
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('CON_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
}