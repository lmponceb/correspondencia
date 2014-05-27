<?php
 
 namespace Usuarios\Model\Dao;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Sql;
  use Usuarios\Model\Entity\Rol;


 class RolDao
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

     public function getRolesSelect()
     {
         $resultSet= $this->tableGateway->select();
         $result=array();
         foreach($resultSet as $rol){
            $result[$rol->getRol_id()]=$rol->getRol_descripcion();
         }
         return $result;
     }

    public function guardar(Rol $rol){

        $data=array(
            'rol_descripcion'=>$rol->getRol_descripcion(),
            'rol_id'=>$rol->getRol_id(),
        );

        if(empty($data['rol_id']) || is_null($data['rol_id'])){
            $data['rol_id'] = new \Zend\Db\Sql\Expression('s_rol.nextVal');
            $data=array_change_key_case($data,CASE_UPPER);
            $this->tableGateway->insert($data);
            
        }else{
            $data=array_change_key_case($data,CASE_UPPER);
            $this->tableGateway->update($data,array('ROL_ID' => $data['ROL_ID']));
        }
     }

    public function traerPorId($rol_id)
     {
        $resultSet = $this->tableGateway->select(array('ROL_ID'=>$rol_id));
        $row=$resultSet->current();
        return $row;
     }


     public function existeDescripcion($rol_descripcion,$rol_id=null){

        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->from($this->tableGateway->table);
        $select->where(array('ROL_DESCRIPCION' => $rol_descripcion));
        if($rol_id != '' && !is_null($rol_id)){
            $select->where->notEqualTo('ROL_ID',$rol_id);
        }
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $count=0;
        foreach($results as $row){$count++; break;   }
        if($count){
            return 'false';   
        }
 
        return 'true'; 

     }
 }