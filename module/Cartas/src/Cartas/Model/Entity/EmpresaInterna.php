<?php
namespace Cartas\Model\Entity;

class EmpresaInterna {
	
	private $emp_int_id;
	private $emp_int_abreviacion;
	private $emp_int_nombre;
	private $emp_int_direccion;
	private $emp_int_ciudad;
	private $emp_int_pais;
	private $emp_int_pbx;
	
	function __construct() {}

	/**
	 * @return the $emp_int_id
	 */
	public function getEmp_int_id() {
		return $this->emp_int_id;
	}

	/**
	 * @return the $emp_int_abreviacion
	 */
	public function getEmp_int_abreviacion() {
		return $this->emp_int_abreviacion;
	}

	/**
	 * @return the $emp_int_nombre
	 */
	public function getEmp_int_nombre() {
		return $this->emp_int_nombre;
	}

	/**
	 * @return the $emp_int_direccion
	 */
	public function getEmp_int_direccion() {
		return $this->emp_int_direccion;
	}

	/**
	 * @return the $emp_int_ciudad
	 */
	public function getEmp_int_ciudad() {
		return $this->emp_int_ciudad;
	}

	/**
	 * @return the $emp_int_pais
	 */
	public function getEmp_int_pais() {
		return $this->emp_int_pais;
	}

	/**
	 * @return the $emp_int_pbx
	 */
	public function getEmp_int_pbx() {
		return $this->emp_int_pbx;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_id
	 */
	public function setEmp_int_id($emp_int_id) {
		$this->emp_int_id = $emp_int_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_abreviacion
	 */
	public function setEmp_int_abreviacion($emp_int_abreviacion) {
		$this->emp_int_abreviacion = $emp_int_abreviacion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_nombre
	 */
	public function setEmp_int_nombre($emp_int_nombre) {
		$this->emp_int_nombre = $emp_int_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_direccion
	 */
	public function setEmp_int_direccion($emp_int_direccion) {
		$this->emp_int_direccion = $emp_int_direccion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_ciudad
	 */
	public function setEmp_int_ciudad($emp_int_ciudad) {
		$this->emp_int_ciudad = $emp_int_ciudad;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_pais
	 */
	public function setEmp_int_pais($emp_int_pais) {
		$this->emp_int_pais = $emp_int_pais;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_pbx
	 */
	public function setEmp_int_pbx($emp_int_pbx) {
		$this->emp_int_pbx = $emp_int_pbx;
	}

	public function exchangeArray($data)
	{
		$this->emp_int_id = (isset($data['EMP_INT_ID'])) ? $data['EMP_INT_ID'] : null;
		$this->emp_int_abreviacion = (isset($data['EMP_INT_ABREVIACION'])) ? $data['EMP_INT_ABREVIACION'] : null;
		$this->emp_int_nombre = (isset($data['EMP_INT_NOMBRE'])) ? $data['EMP_INT_NOMBRE'] : null;
		$this->emp_int_direccion = (isset($data['EMP_INT_DIRECCION'])) ? $data['EMP_INT_DIRECCION'] : null;
		$this->emp_int_ciudad = (isset($data['EMP_INT_CIUDAD'])) ? $data['EMP_INT_CIUDAD'] : null;
		$this->emp_int_pais = (isset($data['EMP_INT_PAIS'])) ? $data['EMP_INT_PAIS'] : null;
		$this->emp_int_pbx = (isset($data['EMP_INT_PBX'])) ? $data['EMP_INT_PBX'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}