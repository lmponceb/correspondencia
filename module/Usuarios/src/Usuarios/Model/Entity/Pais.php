<?php
namespace Contactos\Model\Entity;

class Pais {
	
	private $pai_id;
	private $pai_nombre;
	private $pai_codigo_telefono;
	
	function __construct() {}
	
	/**
	 * @return the $pai_id
	 */
	public function getPai_id() {
		return $this->pai_id;
	}

	/**
	 * @return the $pai_nombre
	 */
	public function getPai_nombre() {
		return $this->pai_nombre;
	}

	/**
	 * @return the $pai_codigo_telefono
	 */
	public function getPai_codigo_telefono() {
		return $this->pai_codigo_telefono;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pai_id
	 */
	public function setPai_id($pai_id) {
		$this->pai_id = $pai_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pai_nombre
	 */
	public function setPai_nombre($pai_nombre) {
		$this->pai_nombre = $pai_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pai_codigo_telefono
	 */
	public function setPai_codigo_telefono($pai_codigo_telefono) {
		$this->pai_codigo_telefono = $pai_codigo_telefono;
	}

	public function exchangeArray($data)
	{
		$this->pai_id = (isset($data['PAI_ID'])) ? $data['PAI_ID'] : null;
		$this->pai_nombre = (isset($data['PAI_NOMBRE'])) ? $data['PAI_NOMBRE'] : null;
		$this->pai_codigo_telefono = (isset($data['PAI_CODIGO_TELEFONO'])) ? $data['PAI_CODIGO_TELEFONO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
