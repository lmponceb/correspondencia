<?php

namespace Empresas\Model\Entity;

 class Empresas
 {
    public $emp_id;
    public $cat_emp_id;
    public $ciu_id;
    public $emp_nombre;
    public $emp_direccion;

     public function exchangeArray($data)
     {
        $this->emp_id       = (!empty($data['EMP_ID'])) ? $data['EMP_ID'] : null;
        $this->cat_emp_id   = (!empty($data['CAT_EMP_ID'])) ? $data['CAT_EMP_ID'] : null;
        $this->ciu_id       = (!empty($data['CIU_ID'])) ? $data['CIU_ID'] : null;
        $this->emp_nombre   = (!empty($data['EMP_NOMBRE'])) ? $data['EMP_NOMBRE'] : null;
        $this->emp_direccion= (!empty($data['EMP_DIRECCION'])) ? $data['EMP_DIRECCION'] : null;
     }
 }