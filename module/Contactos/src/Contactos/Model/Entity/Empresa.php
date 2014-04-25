<?php
namespace Contactos\Model\Entity;

class Empresa {
	
	private $emp_id;
	private $cat_emp_id;
	private $ciu_id;
	private $emp_nombre;
	private $emp_direccion;
	private $emp_referencia;
	private $emp_sector;
	private $emp_email;
	private $emp_pagina_web;
	private $emp_fecha_actualizacion;
	private $emp_usuario;

	function __construct() {}
	
	/**
	 * @return the $emp_id
	 */
	public function getEmp_id() {
		return $this->emp_id;
	}

	/**
	 * @return the $cat_emp_id
	 */
	public function getCat_emp_id() {
		return $this->cat_emp_id;
	}

	/**
	 * @return the $ciu_id
	 */
	public function getCiu_id() {
		return $this->ciu_id;
	}

	/**
	 * @return the $emp_nombre
	 */
	public function getEmp_nombre() {
		return $this->emp_nombre;
	}

	/**
	 * @return the $emp_direccion
	 */
	public function getEmp_direccion() {
		return $this->emp_direccion;
	}

	/**
	 * @return the $emp_referencia
	 */
	public function getEmp_referencia() {
		return $this->emp_referencia;
	}

	/**
	 * @return the $emp_sector
	 */
	public function getEmp_sector() {
		return $this->emp_sector;
	}

	/**
	 * @return the $emp_email
	 */
	public function getEmp_email() {
		return $this->emp_email;
	}

	/**
	 * @return the $emp_pagina_web
	 */
	public function getEmp_pagina_web() {
		return $this->emp_pagina_web;
	}

	/**
	 * @return the $emp_fecha_actualizacion
	 */
	public function getEmp_fecha_actualizacion() {
		return $this->emp_fecha_actualizacion;
	}

	/**
	 * @return the $emp_usuario
	 */
	public function getEmp_usuario() {
		return $this->emp_usuario;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_id
	 */
	public function setEmp_id($emp_id) {
		$this->emp_id = $emp_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $cat_emp_id
	 */
	public function setCat_emp_id($cat_emp_id) {
		$this->cat_emp_id = $cat_emp_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ciu_id
	 */
	public function setCiu_id($ciu_id) {
		$this->ciu_id = $ciu_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_nombre
	 */
	public function setEmp_nombre($emp_nombre) {
		$this->emp_nombre = $emp_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_direccion
	 */
	public function setEmp_direccion($emp_direccion) {
		$this->emp_direccion = $emp_direccion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_referencia
	 */
	public function setEmp_referencia($emp_referencia) {
		$this->emp_referencia = $emp_referencia;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_sector
	 */
	public function setEmp_sector($emp_sector) {
		$this->emp_sector = $emp_sector;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_email
	 */
	public function setEmp_email($emp_email) {
		$this->emp_email = $emp_email;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_pagina_web
	 */
	public function setEmp_pagina_web($emp_pagina_web) {
		$this->emp_pagina_web = $emp_pagina_web;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_fecha_actualizacion
	 */
	public function setEmp_fecha_actualizacion($emp_fecha_actualizacion) {
		$this->emp_fecha_actualizacion = $emp_fecha_actualizacion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_usuario
	 */
	public function setEmp_usuario($emp_usuario) {
		$this->emp_usuario = $emp_usuario;
	}

	public function exchangeArray($data)
	{
		$this->emp_id = (isset($data['EMP_ID'])) ? $data['EMP_ID'] : null;
		$this->cat_emp_id = (isset($data['CAT_EMP_ID'])) ? $data['CAT_EMP_ID'] : null;
		$this->ciu_id = (isset($data['CIU_ID'])) ? $data['CIU_ID'] : null;
		$this->emp_nombre = (isset($data['EMP_NOMBRE'])) ? $data['EMP_NOMBRE'] : null;
		$this->emp_direccion = (isset($data['EMP_DIRECCION'])) ? $data['EMP_DIRECCION'] : null;
		$this->emp_referencia = (isset($data['EMP_REFERENCIA'])) ? $data['EMP_REFERENCIA'] : null;
		$this->emp_sector = (isset($data['EMP_SECTOR'])) ? $data['EMP_SECTOR'] : null;
		$this->emp_email = (isset($data['EMP_EMAIL'])) ? $data['EMP_EMAIL'] : null;
		$this->emp_pagina_web = (isset($data['EMP_PAGINA_WEB'])) ? $data['EMP_PAGINA_WEB'] : null;
		$this->emp_fecha_actualizacion = (isset($data['EMP_FECHA_ACTUALIZACION'])) ? $data['EMP_FECHA_ACTUALIZACION'] : null;
		$this->emp_usuario = (isset($data['EMP_USUARIO'])) ? $data['EMP_USUARIO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
