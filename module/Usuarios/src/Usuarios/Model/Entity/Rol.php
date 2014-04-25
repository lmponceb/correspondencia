<?php
namespace Usuarios\Model\Entity;

class Rol {
	
	private $rol_id;
	private $rol_descripcion;
	
	function __construct() {}

	/**
	 * @return the $rol_id
	 */
	public function getRol_id() {
		return $this->rol_id;
	}

	/**
	 * @return the $rol_descripcion
	 */
	public function getRol_descripcion() {
		return $this->rol_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_id
	 */
	public function setRol_id($rol_id) {
		$this->rol_id = $rol_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_descripcion
	 */
	public function setRol_descripcion($rol_descripcion) {
		$this->rol_descripcion = $rol_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->rol_id = (isset($data['ROL_ID'])) ? $data['ROL_ID'] : null;
		$this->rol_descripcion = (isset($data['ROL_DESCRIPCION'])) ? $data['ROL_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
