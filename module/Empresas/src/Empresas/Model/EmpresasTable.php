<?php
 
 namespace Empresas\Model;

 use Zend\Db\TableGateway\TableGateway;

 class EmpresasTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getEmpresas($emp_id)
     {
         $emp_id  = (int) $emp_id;
         $rowset = $this->tableGateway->select(array('emp_id' => $emp_id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $emp_id");
         }
         return $row;
     }

     /*public function saveAlbum(Album $album)
     {
         $data = array(
             'artist' => $album->artist,
             'title'  => $album->title,
         );

         $id = (int) $album->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAlbum($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Album id does not exist');
             }
         }
     }

     public function deleteAlbum($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }*/
 }