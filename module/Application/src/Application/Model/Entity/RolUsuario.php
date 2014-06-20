<?php

namespace Application\Model\Entity;

 class RolUsuario
 {
    private $rol_id;
    private $us_codigo;

public function getRol_id(){return $this->rol_id;}
public function getUs_codigo(){return $this->us_codigo;}
public function setRol_id($rol_id){$this->rol_id=$rol_id;}
public function setUs_codigo($us_codigo){$this->us_codigo=$us_codigo;}

     public function exchangeArray($data)
     {
        $this->rol_id  = (!empty($data['ROL_ID'])) ? $data['ROL_ID'] : null;
        $this->us_codigo  = (!empty($data['US_CODIGO'])) ? $data['US_CODIGO'] : null;
     }
 }