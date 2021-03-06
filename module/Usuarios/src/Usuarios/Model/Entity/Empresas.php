<?php

namespace Empresas\Model\Entity;

 class Empresas
 {
    public $emp_id;
    public $emp_emp_id;
    public $cat_emp_id;
    public $ciu_id;
    public $emp_nombre;
    public $emp_direccion;    
    public $emp_referencia;
    public $emp_sector;    
    public $emp_email;
    public $emp_pagina_web;
    public $emp_documento;
    public $emp_estado;    

    public function getEmp_id(){ return $this->emp_id; }
    public function getEmp_emp_id(){ return $this->emp_emp_id; }
    public function getCat_emp_id(){ return $this->cat_emp_id; }
    public function getCiu_id(){ return $this->ciu_id; }
    public function getEmp_nombre(){ return $this->emp_nombre; }
    public function getEmp_direccion(){ return $this->emp_direccion; }
    public function getEmp_referencia(){ return $this->emp_referencia; }
    public function getEmp_sector(){ return $this->emp_sector; }
    public function getEmp_email(){ return $this->emp_email; }
    public function getEmp_pagina_web(){ return $this->emp_pagina_web; }
    public function getEmp_documento(){ return $this->emp_documento; }
    public function getEmp_estado(){ return $this->emp_estado; }    

    public function setEmp_id ($emp_id) { $this->emp_id=emp_id; }
    public function setEmp_emp_id ($emp_emp_id) { $this->emp_emp_id=emp_emp_id; }
    public function setCat_emp_id ($cat_emp_id) { $this->cat_emp_id=cat_emp_id; }
    public function setCiu_id ($ciu_id) { $this->ciu_id=ciu_id; }
    public function setEmp_nombre ($emp_nombre) { $this->emp_nombre=emp_nombre; }
    public function setEmp_direccion ($emp_direccion) { $this->emp_direccion=emp_direccion; }
    public function setEmp_referencia ($emp_referencia) { $this->emp_referencia=emp_referencia; }
    public function setEmp_sector ($emp_sector) { $this->emp_sector=emp_sector; }
    public function setEmp_email ($emp_email) { $this->emp_email=emp_email; }
    public function setEmp_pagina_web ($emp_pagina_web) { $this->emp_pagina_web=emp_pagina_web; }
    public function setEmp_documento ($emp_documento) { $this->emp_documento=emp_documento; }
    public function setEmp_estado ($emp_estado) { $this->emp_estado=emp_estado; }    

    public function exchangeArray($data)
    {
        $this->emp_id       = (!empty($data['EMP_ID'])) ? $data['EMP_ID'] : null;
        $this->emp_emp_id       = (!empty($data['EMP_EMP_ID'])) ? $data['EMP_EMP_ID'] : null;        
        $this->cat_emp_id   = (!empty($data['CAT_EMP_ID'])) ? $data['CAT_EMP_ID'] : null;
        $this->ciu_id       = (!empty($data['CIU_ID'])) ? $data['CIU_ID'] : null;
        $this->emp_nombre   = (!empty($data['EMP_NOMBRE'])) ? $data['EMP_NOMBRE'] : null;
        $this->emp_direccion= (!empty($data['EMP_DIRECCION'])) ? $data['EMP_DIRECCION'] : null;
        $this->emp_referencia = (!empty($data['EMP_REFERENCIA'])) ? $data['EMP_REFERENCIA'] : null;
        $this->emp_sector = (!empty($data['EMP_SECTOR'])) ? $data['EMP_SECTOR'] : null;
        $this->emp_email = (!empty($data['EMP_EMAIL'])) ? $data['EMP_EMAIL'] : null;
        $this->emp_pagina_web = (!empty($data['EMP_PAGINA_WEB'])) ? $data['EMP_PAGINA_WEB'] : null;    
        $this->emp_documento = (!empty($data['EMP_DOCUMENTO'])) ? $data['EMP_DOCUMENTO'] : null;           
        $this->emp_estado = (!empty($data['EMP_ESTADO'])) ? $data['EMP_ESTADO'] : null;           

    }

    public function getArrayCopy(){
        return array_change_key_case(get_object_vars($this), CASE_UPPER);
    }
    
 }