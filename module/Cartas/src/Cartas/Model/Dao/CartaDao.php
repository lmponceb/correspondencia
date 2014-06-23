<?php
namespace Cartas\Model\Dao;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Cartas\Model\Entity\Carta;
use Zend\Db\Sql;
use Zend\Db\Sql\Sql as Sqla;
use Zend\Db\Sql\Expression;

class CartaDao {
	
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway){
    	$this->tableGateway = $tableGateway;
    }
    
    public function traerTodos(){
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'EMPRESA_INTERNA', 'EMPRESA_INTERNA.EMP_INT_ID  = CARTA.EMP_INT_ID' );
    	$select->join ( 'TIPO_CARTA', 'TIPO_CARTA.TIP_CAR_ID  = CARTA.TIP_CAR_ID' );
    	$select->join ( 'CARTA_DESTINATARIO', 'CARTA_DESTINATARIO.CTR_ID  = CARTA.CTR_ID' );
    	$select->join ( 'CONTACTO', 'CONTACTO.CON_ID  = CARTA_DESTINATARIO.CON_ID' );
    	$select->where(array('CTR_PRIVADA' => 'N'));
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
        return $resultSet;
    }
    
    public function traerTodosPrivados(){
    	
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'EMPRESA_INTERNA', 'EMPRESA_INTERNA.EMP_INT_ID  = CARTA.EMP_INT_ID' );
    	$select->join ( 'TIPO_CARTA', 'TIPO_CARTA.TIP_CAR_ID  = CARTA.TIP_CAR_ID' );
    	$select->join ( 'CARTA_DESTINATARIO', 'CARTA_DESTINATARIO.CTR_ID  = CARTA.CTR_ID' );
    	$select->join ( 'CONTACTO', 'CONTACTO.CON_ID  = CARTA_DESTINATARIO.CON_ID' );
    	$select->where(array('CTR_PRIVADA' => 'S', 'US_CODIGO' => $_SESSION['Zend_Auth']['storage']->US_CODIGO));
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	return $resultSet;
    }
    
    public function traerEmpresaInterna($id){
    	$select = $this->tableGateway->getSql ()->select ();
    	$select->join ( 'EMPRESA_INTERNA', 'EMPRESA_INTERNA.EMP_INT_ID  = CARTA.EMP_INT_ID' );
    	$select->join ( 'TIPO_CARTA', 'TIPO_CARTA.TIP_CAR_ID  = CARTA.TIP_CAR_ID' );
    	$select->where(array('CTR_ID' => $id));
    	 
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	return $resultSet;
    }
    
    public function traer($id){
    	
    	$id = ( int ) $id;
    	
    	$resultSet = $this->tableGateway->select(array('CTR_ID' => $id));
    	$row = $resultSet->current();
    	return $row;
    }
    
    public function guardar(Carta $carta){
    	date_default_timezone_set('America/Guayaquil');
    	 
    	$id = (int) $carta->getCtr_id();
    	 
    	$data = array(
    			'PRO_ID' => $carta->getPro_id(),
    			'EMP_INT_ID' => $carta->getEmp_int_id(),
    			'US_CODIGO' => $carta->getUs_codigo(),
    			'TIP_CAR_ID' => $carta->getTip_car_id(),
    			'CTR_IDIOMA' => $carta->getCtr_idioma(),
    			'CTR_FECHA_CREACION' => $carta->getCtr_fecha_creacion(),
    			'CTR_CUERPO' => $carta->getCtr_cuerpo(),
    			'CTR_CODIGO_FINAL' => $carta->getCtr_codigo_final(),
    			'CTR_FECHA_ACTUALIZACION' => date('d-M-Y'),
    			'CTR_REFERENCIA' => $carta->getCtr_referencia(),
    			'CTR_SALUDO' => $carta->getCtr_saludo(),
    			'CTR_DESPEDIDA' => $carta->getCtr_despedida(),
    			'CTR_TIPO' => $carta->getCtr_tipo(),
    			'CTR_ESTADO' => $carta->getCtr_estado(),
    			'CTR_ACTIVAR_DIRECCION' => $carta->getCtr_activar_direccion(),
    			'CTR_DIRECCION_EMPRESA' => $carta->getCtr_direccion_empresa(),
    			'CTR_COPIA' => $carta->getCtr_copia(),
    			'CTR_ANEXOS' => $carta->getCtr_anexos(),
    			'CTR_PRIVADA' => $carta->getCtr_privada()
    	);
    	 
    	if(empty($id) || is_null($id)){
    		$data['CTR_ID'] = new Sql\Expression('s_carta.nextVal');
    		$this->tableGateway->insert($data);
    			
    		$adapter=$this->tableGateway->getAdapter();
    		$query ="SELECT s_carta.currVal FROM CARTA";
    		$statement = $adapter->query ( $query );
    		$results =  $statement->execute ();
    			
    		return $results;
    
    	}else{
    		if($this->traer($id)){
    			$this->tableGateway->update($data, array('CTR_ID' => $id ));
    		}else{
    			throw new \Exception( 'No se encontro el id para actualizar' );
    		}
    	}
    }
    
    public function duplicar(Carta $carta){
    	date_default_timezone_set('America/Guayaquil');
    
    	$id = (int) $carta->getCtr_id();
    
    	$data = array(
    			//'CTR_ID' => (int) $carta->getCtr_id(),
    			'PRO_ID' => $carta->getPro_id(),
    			'EMP_INT_ID' => $carta->getEmp_int_id(),
    			'US_CODIGO' =>  $_SESSION['Zend_Auth']['storage']->US_CODIGO,
    			'TIP_CAR_ID' => $carta->getTip_car_id(),
    			'CTR_IDIOMA' => $carta->getCtr_idioma(),
    			'CTR_FECHA_CREACION' => date('d-M-Y'),
    			'CTR_CUERPO' =>  $carta->getCtr_cuerpo()->read($carta->getCtr_cuerpo()->size()),
    			'CTR_CODIGO_FINAL' => null,
    			'CTR_FECHA_ACTUALIZACION' => date('d-M-Y'),
    			'CTR_REFERENCIA' => $carta->getCtr_referencia(),
    			'CTR_SALUDO' => $carta->getCtr_saludo(),
    			'CTR_DESPEDIDA' => $carta->getCtr_despedida(),
    			'CTR_TIPO' => 'B',
    			'CTR_ESTADO' => 'A',
    			'CTR_ACTIVAR_DIRECCION' => $carta->getCtr_activar_direccion(),
    			'CTR_DIRECCION_EMPRESA' => $carta->getCtr_direccion_empresa(),
    			'CTR_COPIA' => $carta->getCtr_copia(),
    			'CTR_ANEXOS' => $carta->getCtr_anexos(),
    			'CTR_PRIVADA' => $carta->getCtr_privada()
    	);
    	
    	$data['CTR_ID'] = new Sql\Expression('s_carta.nextVal');
    	$this->tableGateway->insert($data);

    	
    	$adapter=$this->tableGateway->getAdapter();
    	$query ="SELECT s_carta.currVal FROM CARTA";
    	$statement = $adapter->query ( $query );
    	$results =  $statement->execute ();
    	 
    	return $results;
    }
    
	public function procesar($id, $role, $anio, $empresa_interna){
		
		$data['CTR_TIPO'] = 'P';
		$data['CTR_CODIGO_FINAL'] = $empresa_interna . '-' . $role . '-' . $anio . '-' . $id;

		if($this->traer($id)){
			$this->tableGateway->update($data, array('CTR_ID' => $id ));
				
		}else{
			throw new \Exception( 'No se encontro el id para actualizar' );
		}
	}
	
	public function eliminar($id){
		$id = (int) $id;
		$this->tableGateway->delete(array('CTR_ID' => $id));
	}
	
	public function traerSaludosJsonPorNombre($term){
		$sql = new Sqla($this->tableGateway->getAdapter());
		$select = $sql->select();
		$select->from($this->tableGateway->table);
	
		$select->where->expression('UPPER(CTR_SALUDO) LIKE UPPER(?)','%'.$term.'%');
	
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
	
		$result = array();
			
		foreach ($results as $row){
			$result[$row['CTR_ID']]['label']=$row['CTR_SALUDO'];
			$result[$row['CTR_ID']]['value']=$row['CTR_SALUDO'];
		}
	
		return json_encode($result);
	
	}
	
	public function traerDespedidaJsonPorNombre($term){
		$sql = new Sqla($this->tableGateway->getAdapter());
		$select = $sql->select();
		$select->from($this->tableGateway->table);
	
		$select->where->expression('UPPER(CTR_DESPEDIDA) LIKE UPPER(?)','%'.$term.'%');
	
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
	
		$result = array();
			
		foreach ($results as $row){
			$result[$row['CTR_ID']]['label']=$row['CTR_DESPEDIDA'];
			$result[$row['CTR_ID']]['value']=$row['CTR_DESPEDIDA'];
		}
	
		return json_encode($result);
	
	}
	
	public function traerCartasPorContacto($con_id){
		
		$id = (int)$con_id;
		
		$sql = new Sqla($this->tableGateway->getAdapter());
		$select = $sql->select();
		$select->columns(array('TOTAL' => new Expression('COUNT(?)', array('*'), array(Expression::TYPE_IDENTIFIER))));
		$select->from('CARTA_DESTINATARIO');
		$select->where(array('CON_ID' => $id));
		
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		$row = $results->current();
		
		return $row;
		
	}
}