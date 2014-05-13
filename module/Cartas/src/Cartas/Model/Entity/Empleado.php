<?php
namespace Cartas\Model\Entity;

class Empleado {
	
	private $epl_id;
	private $emp_int_id;
	private $epl_nombre;
	private $epl_apellido;
	private $epl_cargo;
	
	function __construct() {}

	/**
	 * @return the $epl_id
	 */
	public function getEpl_id() {
		return $this->epl_id;
	}

	/**
	 * @return the $emp_int_id
	 */
	public function getEmp_int_id() {
		return $this->emp_int_id;
	}

	/**
	 * @return the $epl_nombre
	 */
	public function getEpl_nombre() {
		return $this->epl_nombre;
	}

	/**
	 * @return the $epl_apellido
	 */
	public function getEpl_apellido() {
		return $this->epl_apellido;
	}

	/**
	 * @return the $epl_cargo
	 */
	public function getEpl_cargo() {
		return $this->epl_cargo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $epl_id
	 */
	public function setEpl_id($epl_id) {
		$this->epl_id = $epl_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_id
	 */
	public function setEmp_int_id($emp_int_id) {
		$this->emp_int_id = $emp_int_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $epl_nombre
	 */
	public function setEpl_nombre($epl_nombre) {
		$this->epl_nombre = $epl_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $epl_apellido
	 */
	public function setEpl_apellido($epl_apellido) {
		$this->epl_apellido = $epl_apellido;
	}

	/**
	 * @param Ambigous <NULL, unknown> $epl_cargo
	 */
	public function setEpl_cargo($epl_cargo) {
		$this->epl_cargo = $epl_cargo;
	}

	public function exchangeArray($data)
	{
		$this->epl_id = (isset($data['EPL_ID'])) ? $data['EPL_ID'] : null;
		$this->emp_int_id = (isset($data['EMP_INT_ID'])) ? $data['EMP_INT_ID'] : null;
		$this->epl_nombre = (isset($data['EPL_NOMBRE'])) ? $data['EPL_NOMBRE'] : null;
		$this->epl_apellido = (isset($data['EPL_APELLIDO'])) ? $data['EPL_APELLIDO'] : null;
		$this->epl_cargo = (isset($data['EPL_CARGO'])) ? $data['EPL_CARGO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
