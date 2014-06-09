<?php
namespace Contactos\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql as Sqla;
use Contactos\Model\Entity\Contacto;
use Zend\Db\Sql;
use Zend\Db\Sql\Predicate\Expression;



class ContactoDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'CIUDAD', 'CIUDAD.CIU_ID  = CONTACTO.CIU_ID' );
    	$select->join ( 'ESTADO', 'ESTADO.EST_ID  = CIUDAD.EST_ID' );
    	$select->join ( 'PAIS', 'PAIS.PAI_ID  = ESTADO.PAI_ID' );
    	$select->join ( 'EMPRESA', 'EMPRESA.EMP_ID  = CONTACTO.EMP_ID' );
    	$select->join (array('SUC' => 'EMPRESA'), 'SUC.EMP_ID  = EMPRESA.EMP_EMP_ID', array('SUC_NOMBRE' => 'EMP_NOMBRE'), 'left' );
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
        return $resultSet;
    }
    
    public function traerTodosActivo(){
    	
    	$rol = $_SESSION['Zend_Auth']['storage']->us_role;
    	
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'CIUDAD', 'CIUDAD.CIU_ID  = CONTACTO.CIU_ID' );
    	$select->join ( 'ESTADO', 'ESTADO.EST_ID  = CIUDAD.EST_ID' );
    	$select->join ( 'PAIS', 'PAIS.PAI_ID  = ESTADO.PAI_ID' );
    	$select->join ( 'EMPRESA', 'EMPRESA.EMP_ID  = CONTACTO.EMP_ID' );
    	$select->join (array('SUC' => 'EMPRESA'), 'SUC.EMP_ID  = EMPRESA.EMP_EMP_ID', array('SUC_NOMBRE' => 'EMP_NOMBRE'), 'left' );
    	
    	switch ($rol){
    		//Administrador
    		case 1:
    			//$select->where(array('CONTACTO.CON_ESTADO' => 'A'));
    			break;
    		
    		//Gerecial
    		case 2:
    			$select->where(array('CONTACTO.CON_ESTADO' => 'A'));
    			break;
    		
    		//Operaciones
    		case 3:
    			$select->where(array('CONTACTO.CON_ESTADO' => 'A'));
    			break;
    			
    		default:
    			$select->where(array('CONTACTO.CON_ESTADO' => 'A'));
    			break;
    	}
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	return $resultSet;
    	
    }
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'CIUDAD', 'CIUDAD.CIU_ID  = CONTACTO.CIU_ID' );
    	$select->join ( 'ESTADO', 'ESTADO.EST_ID  = CIUDAD.EST_ID' );
    	$select->join ( 'PAIS', 'PAIS.PAI_ID  = ESTADO.PAI_ID' );
    	$select->join ( 'EMPRESA', 'EMPRESA.EMP_ID  = CONTACTO.EMP_ID' );
    	$select->join (array('SUC' => 'EMPRESA'), 'SUC.EMP_ID  = EMPRESA.EMP_EMP_ID', array('SUC_NOMBRE' => 'EMP_NOMBRE'), 'left' );
    	$select->where(array('CON_ID' => $id));
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function guardar(Contacto $contacto){
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
    			'CON_ESTADO' => $contacto->getCon_estado(),
    			'CON_OBSERVACIONES_PRIVADO' => $contacto->getCon_observaciones_privado(),
    			'CON_ACTIVAR_DIRECCION' => $contacto->getCon_activar_direccion(),
    			'CON_DIRECCION_EMPRESA' => $contacto->getCon_direccion_empresa()
    	);
    	
    	if(empty($id) || is_null($id)){
    		$data['CON_ID'] = new Sql\Expression('s_contacto.nextVal');
    		$this->tableGateway->insert($data);
			
			$adapter=$this->tableGateway->getAdapter();
			$query ="SELECT s_contacto.currVal FROM CONTACTO";
			$statement = $adapter->query ( $query );
			$results =  $statement->execute ();
			
			return $results;
    		
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
	}
	
	public function traerListadoJsonPorNombre($term){
		$sql = new Sqla($this->tableGateway->getAdapter());
		$select = $sql->select();
		$select->from($this->tableGateway->table);
	
		$select->where->expression('UPPER(CON_TIP_PER_ES) LIKE UPPER(?)','%'.$term.'%');
	
		//echo $sql->getSqlStringForSqlObject($select);
		
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
	
		$result = array();
		 
		foreach ($results as $row){
			$result[$row['CON_ID']]['label']=$row['CON_TIP_PER_ES'];
			$result[$row['CON_ID']]['value']=$row['CON_TIP_PER_ES'];
		}
		
		return json_encode($result);
	
	}
	
	public function traerListadoJsonPorNombreEn($term){
		$sql = new Sqla($this->tableGateway->getAdapter());
		$select = $sql->select();
		$select->from($this->tableGateway->table);
	
		$select->where->expression('UPPER(CON_TIP_PER_EN) LIKE UPPER(?)','%'.$term.'%');
	
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
	
		$result = array();
			
		foreach ($results as $row){
			$result[$row['CON_ID']]['label']=$row['CON_TIP_PER_EN'];
			$result[$row['CON_ID']]['value']=$row['CON_TIP_PER_EN'];
		}
	
		return json_encode($result);
	
	}
	
	public function traerCargoJsonPorNombreEs($term){
		$sql = new Sqla($this->tableGateway->getAdapter());
		$select = $sql->select();
		$select->from($this->tableGateway->table);
	
		$select->where->expression('UPPER(CON_DESCRIPCION_ES) LIKE UPPER(?)','%'.$term.'%');
	
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
	
		$result = array();
			
		foreach ($results as $row){
			$result[$row['CON_ID']]['label']=$row['CON_DESCRIPCION_ES'];
			$result[$row['CON_ID']]['value']=$row['CON_DESCRIPCION_ES'];
		}
	
		return json_encode($result);
	
	}
	
	public function traerCargoJsonPorNombreEn($term){
		$sql = new Sqla($this->tableGateway->getAdapter());
		$select = $sql->select();
		$select->from($this->tableGateway->table);
	
		$select->where->expression('UPPER(CON_DESCRIPCION_EN) LIKE UPPER(?)','%'.$term.'%');
	
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
	
		$result = array();
			
		foreach ($results as $row){
			$result[$row['CON_ID']]['label']=$row['CON_DESCRIPCION_EN'];
			$result[$row['CON_ID']]['value']=$row['CON_DESCRIPCION_EN'];
		}
	
		return json_encode($result);
	
	}
	
}