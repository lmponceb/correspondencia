<?php
namespace Cartas\Model\Entity;

class EmpresaInterna {
	
	private $emp_int_id;
	private $emp_int_abreviacion;
	private $emp_int_nombre;
	
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

	public function exchangeArray($data)
	{
		$this->emp_int_id = (isset($data['EMP_INT_ID'])) ? $data['EMP_INT_ID'] : null;
		$this->emp_int_abreviacion = (isset($data['EMP_INT_ABREVIACION'])) ? $data['EMP_INT_ABREVIACION'] : null;
		$this->emp_int_nombre = (isset($data['EMP_INT_NOMBRE'])) ? $data['EMP_INT_NOMBRE'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
