<?php
namespace Usuarios\Model\Entity;

class RolUsuario {
	
	private $rol_id;
	private $us_codigo;
	
	function __construct() {}
	
	/**
	 * @return the $rol_id
	 */
	public function getRol_id() {
		return $this->rol_id;
	}

	/**
	 * @return the $us_codigo
	 */
	public function getUs_codigo() {
		return $this->us_codigo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_id
	 */
	public function setRol_id($rol_id) {
		$this->rol_id = $rol_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_codigo
	 */
	public function setUs_codigo($us_codigo) {
		$this->us_codigo = $us_codigo;
	}

	public function exchangeArray($data)
	{
		$this->rol_id = (isset($data['ROL_ID'])) ? $data['ROL_ID'] : null;
		$this->us_codigo = (isset($data['US_CODIGO'])) ? $data['US_CODIGO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}		
}
