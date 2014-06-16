<?php

namespace Usuarios\Model\Entity;

 class RolAplicacion
 {
    private $rol_id;
    private $apl_id;

public function getRol_id(){return $this->rol_id;}
public function getApl_id(){return $this->apl_id;}
public function setRol_id($rol_id){$this->rol_id=$rol_id;}
public function setApl_id($apl_id){$this->apl_id=$apl_id;}

     public function exchangeArray($data)
     {
        $this->rol_id  = (!empty($data['ROL_ID'])) ? $data['ROL_ID'] : null;
        $this->apl_id  = (!empty($data['APL_ID'])) ? $data['APL_ID'] : null;
     }
     public function getArrayCopy(){
        return array_change_key_case(get_object_vars($this), CASE_UPPER);
     }
 }