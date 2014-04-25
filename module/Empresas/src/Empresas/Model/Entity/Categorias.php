<?php

namespace Empresas\Model\Entity;

 class Categorias
 {
    public $cat_emp_id;
    public $cat_emp_descripcion;

     public function exchangeArray($data)
     {
        $this->cat_emp_id       = (!empty($data['CAT_EMP_ID'])) ? $data['CAT_EMP_ID'] : null;
        $this->cat_emp_descripcion   = (!empty($data['CAT_EMP_DESCRIPCION'])) ? $data['CAT_EMP_DESCRIPCION'] : null;
     }
 }