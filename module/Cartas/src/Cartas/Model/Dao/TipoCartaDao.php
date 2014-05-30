<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Cartas\Model\Entity\TipoCarta;

class TipoCartaDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	return $this->tableGateway->select ();
    }
    
    public function traerTodosArreglo(){
    	 
    	$sql = new Sql($this->tableGateway->getAdapter());
    	$select = $sql->select();
    	$select->from($this->tableGateway->table);
    	/*Permisos según tipo de cartas*/ 
        $menu=$_SESSION['Zend_Auth']['storage']->menu[$_SESSION['Zend_Auth']['storage']->us_role];
        if(!in_array('parametros:option:transaccion_bancaria',$menu))
            $select->where->notEqualTo('TIP_CAR_ID',4);
        if(!in_array('parametros:option:transferencia_sueldo',$menu))
            $select->where->notEqualTo('TIP_CAR_ID',5);
        /*Fin de permisos según tipo de cartas*/
    	$statement = $sql->prepareStatementForSqlObject($select);
    	$results = $statement->execute();
    	 
    	$tipoCartas = new \ArrayObject();
    	$result = array();
    	 
    	foreach ($results as $row){
    		$tipoCarta = new TipoCarta();
    		$tipoCarta->exchangeArray($row);
    		$tipoCartas->append($tipoCarta);
    	}
    	 
    	foreach ($tipoCartas as $tip_car){
    		$result[$tip_car->getTip_car_id()] = $tip_car->getTip_car_descripcion();
    	}
    
    	return $result;
    }
    
    /* public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('CTR_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    } */
    
    /*public function guardar(Contacto $contacto){ 
    	date_default_timezone_set('America/Guayaquil');
    	
    	$id = (int) $contacto->getCon_id();
    	
    	$data = array(
    			'CIU_ID' => (int) $contacto->getCiu_id(),
    			'CON_NOMBRE' => $contacto->getCon_nombre(),
    			'CON_APELLIDO' => $contacto->getCon_apellido(),
    			'CON_EMAIL' => $contacto->getCon_email(),
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
    			'EMP_ID' => $contacto->getEmp_id(),
    			
    			'CON_DESCRIPCION_ES' => $contacto->getCon_descripcion_es(),
    			'CON_DESCRIPCION_EN' => $contacto->getCon_descripcion_en(),
    			'CON_TIP_PER_ES' => $contacto->getCon_tip_per_es(),
    			'CON_TIP_PER_EN' => $contacto->getCon_tip_per_en(),
    			'CON_DIRECCION' => $contacto->getCon_direccion(),
    			'CON_SECRETARIA' => $contacto->getCon_secretaria(),
    			'CON_SECRETARIA_TELEFONO' => $contacto->getCon_secretaria_telfono(),
    			'CON_ESTADO' => $contacto->getCon_estado()
    	);
    	
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

	public function cambiarEstado($id, $estado){
		
		$data['CON_ESTADO'] = strtoupper($estado);

		if($this->traer($id)){
			$this->tableGateway->update($data, array('CON_ID' => $id ));
				
		}else{
			throw new \Exception( 'No se encontro el id para eliminar' );
		}
	} */
	
}