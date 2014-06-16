<?php

namespace Usuarios\Model\Entity;

 class Aplicacion
 {
    private $apl_descripcion;
    private $apl_id;

public function getApl_descripcion(){return $this->apl_descripcion;}
public function getApl_id(){return $this->apl_id;}
public function setApl_descripcion($apl_descripcion){$this->apl_descripcion=$apl_descripcion;}
public function setApl_id($apl_id){$this->apl_id=$apl_id;}

     public function exchangeArray($data)
     {
        $this->apl_descripcion  = (!empty($data['APL_DESCRIPCION'])) ? $data['APL_DESCRIPCION'] : null;
        $this->apl_id  = (!empty($data['APL_ID'])) ? $data['APL_ID'] : null;
     }
 }
