<?php

namespace Usuarios\Model\Entity;

 class Rol
 {
    private $rol_id;
    private $rol_descripcion;

	public function getRol_id (){return $this->rol_id;}    
	public function getRol_descripcion (){return $this->rol_descripcion;}
    public function getRol_estado (){return $this->rol_estado;}

    public function setRol_id ($rol_id){$this->rol_id =$rol_id; }	
    public function setRol_descripcion ($rol_descripcion){$this->rol_descripcion =$rol_descripcion; }
    public function setRol_estado ($rol_estado){$this->rol_estado =$rol_estado; }   

     public function exchangeArray($data)
     {
        $this->rol_id       	= (!empty($data['ROL_ID'])) ? $data['ROL_ID'] : null;
        $this->rol_descripcion  = (!empty($data['ROL_DESCRIPCION'])) ? $data['ROL_DESCRIPCION'] : null;
        $this->rol_estado       = (!empty($data['ROL_ESTADO'])) ? $data['ROL_ESTADO'] : null;
     }
      public function getArrayCopy(){
        return array_change_key_case(get_object_vars($this), CASE_UPPER);
     }
 }