<?php

namespace Empresas\Model;

 class Empresas
 {
    public $emp_id;
    public $cat_emp_id;
    public $ciu_id;
    public $emp_nombre;
    public $emp_direccion;

     public function exchangeArray($data)
     {
        $this->emp_id       = (!empty($data['emp_id'])) ? $data['emp_id'] : null;
        $this->cat_emp_id   = (!empty($data['cat_emp_id'])) ? $data['cat_emp_id'] : null;
        $this->ciu_id       = (!empty($data['ciu_id'])) ? $data['ciu_id'] : null;
        $this->emp_nombre   = (!empty($data['emp_nombre'])) ? $data['emp_nombre'] : null;
        $this->emp_direccion= (!empty($data['emp_direccion'])) ? $data['emp_direccion'] : null;
     }
 }