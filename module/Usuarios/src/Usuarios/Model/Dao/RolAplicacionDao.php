<?php
 
 namespace Usuarios\Model\Dao;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Sql;
 use Usuarios\Model\Entity\RolAplicacion;

 class RolAplicacionDao
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function traerTodos()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

    public function guardar(RolAplicacion $rolAplicacion){

        $data=array(
            'rol_id'=>$rolAplicacion->getRol_id(),
            'apl_id'=>$rolAplicacion->getApl_id(),
        );

            if(empty($data['rol_id']) || is_null($data['rol_id'])){
                $data['rol_id'] = new \Zend\Db\Sql\Expression('s_rol.currVal');
            }
            $data=array_change_key_case($data,CASE_UPPER);


        $this->tableGateway->insert($data);        
     }

     public function eliminarPorRol($rol_id){
        $adapter=$this->tableGateway->getAdapter();
        $query="DELETE FROM ROL_APLICACION WHERE ROL_ID='$rol_id'";
        $state=$adapter->query($query);
        $state->execute();
     }

     public function traerPorRol($rol_id)
     {
        $resultSet = $this->tableGateway->select(array('ROL_ID'=>$rol_id));
        $result_array=array();
        foreach($resultSet  as $apl){
            $result_array[$apl->getApl_id()]=$apl->getApl_id();
        }
        return $result_array;
     }
 }