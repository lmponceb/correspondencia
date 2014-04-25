<?php
namespace Usuarios\Model\Entity;

class VistaUsuario {
	
	private $us_codigo;
	private $us_clave;
	private $us_nombre;
	
	function __construct() {}
	
	/**
	 * @return the $us_codigo
	 */
	public function getUs_codigo() {
		return $this->us_codigo;
	}

	/**
	 * @return the $us_clave
	 */
	public function getUs_clave() {
		return $this->us_clave;
	}

	/**
	 * @return the $us_nombre
	 */
	public function getUs_nombre() {
		return $this->us_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_codigo
	 */
	public function setUs_codigo($us_codigo) {
		$this->us_codigo = $us_codigo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_clave
	 */
	public function setUs_clave($us_clave) {
		$this->us_clave = $us_clave;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_nombre
	 */
	public function setUs_nombre($us_nombre) {
		$this->us_nombre = $us_nombre;
	}

	public function exchangeArray($data)
	{
		$this->us_codigo = (isset($data['US_CODIGO'])) ? $data['US_CODIGO'] : null;
		$this->us_clave = (isset($data['US_CLAVE'])) ? $data['US_CLAVE'] : null;
		$this->us_nombre = (isset($data['US_NOMBRE'])) ? $data['US_NOMBRE'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
