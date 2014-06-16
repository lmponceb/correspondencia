<?php
 
 namespace Usuarios\Model\Dao;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Sql;
 use Usuarios\Model\Entity\RolUsuario;
 class RolUsuarioDao
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


    public function guardar(RolUsuario $rolUsuario){

        $data=array(
            'US_CODIGO'=>$rolUsuario->getUs_codigo(),
            'ROL_ID'=>$rolUsuario->getRol_id(),
        );

        $this->tableGateway->insert($data);        
     }

     public function eliminarPorUsuario($us_codigo){
        $adapter=$this->tableGateway->getAdapter();
        $query="DELETE FROM ROL_USUARIO WHERE US_CODIGO='$us_codigo'";
        $state=$adapter->query($query);
        $state->execute();
     }

     public function traerPorUsCodigo($us_codigo)
     {
        $resultSet = $this->tableGateway->select(array('US_CODIGO'=>$us_codigo));
        $row=$resultSet->current();
        return $row;
     }
     


 }