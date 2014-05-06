<?php
namespace Contactos\Model\Dao;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Contactos\Model\Entity\DetalleContacto;

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
    
    public function getDetallePorEmpresa($emp_id){
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->from($this->tableGateway->table);
        $select->join(array('E' => 'EMPRESA'),'DETALLE_CONTACTO.EMP_ID = E.EMP_ID');
        $select->where(array('DETALLE_CONTACTO.EMP_ID' => $emp_id));
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        
        $detalles = new \ArrayObject();
        $result = array();
        
        foreach ($results as $row){
            $detalle = new DetalleContacto();
            $detalle->exchangeArray($row);
            $detalles->append($detalle);
        }
    
        return $detalles;
    }

    public function guardar(DetalleContacto $detalleContacto){

        $data=array(
            'det_con_id'=>$detalleContacto->getDet_con_id(),
            'emp_id'=>$detalleContacto->getEmp_id(),
            'con_id'=>$detalleContacto->getCon_id(),
            'tip_tel_id'=>$detalleContacto->getTip_tel_id(),
            'det_con_codigo_pais'=>$detalleContacto->getDet_con_codigo_pais(),
            'det_con_codigo_ciudad'=>$detalleContacto->getDet_con_codigo_ciudad(),
            'det_con_valor'=>$detalleContacto->getDet_con_valor(),
            'det_con_extension'=>$detalleContacto->getDet_con_extension()
        );
        
        if(empty($data['det_con_id']) || is_null($data['det_con_id'])){
            $data['det_con_id'] = new \Zend\Db\Sql\Expression('s_detalle_contacto.nextVal');

           /*  if(empty($data['emp_id']) || is_null($data['emp_id'])){
                $data['emp_id'] = new \Zend\Db\Sql\Expression('s_empresa.currVal');
            } */
            $data=array_change_key_case($data,CASE_UPPER);

            $this->tableGateway->insert($data);
        }
     }
     
     public function eliminarPorContacto($id){
     	$this->tableGateway->delete(array('CON_ID'=>$id));
     }

     public function eliminarPorEmpresa($emp_id){
        $adapter=$this->tableGateway->getAdapter();
        $query="DELETE FROM DETALLE_CONTACTO WHERE EMP_ID=$emp_id";
        $state=$adapter->query($query);
        $state->execute();
     }
     
     public function traerPorContacto($con_id){
     	$resultSet = $this->tableGateway->select(array('CON_ID' => $con_id));
     	return $resultSet;
     }
    
}