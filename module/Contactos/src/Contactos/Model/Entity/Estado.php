<?php
namespace Contactos\Model\Entity;

class Estado {
	
	private $est_id;
	private $pai_id;
	private $est_nombre;
	
	function __construct() {}
	
	/**
	 * @return the $est_id
	 */
	public function getEst_id() {
		return $this->est_id;
	}

	/**
	 * @return the $pai_id
	 */
	public function getPai_id() {
		return $this->pai_id;
	}

	/**
	 * @return the $est_nombre
	 */
	public function getEst_nombre() {
		return $this->est_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $est_id
	 */
	public function setEst_id($est_id) {
		$this->est_id = $est_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pai_id
	 */
	public function setPai_id($pai_id) {
		$this->pai_id = $pai_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $est_nombre
	 */
	public function setEst_nombre($est_nombre) {
		$this->est_nombre = $est_nombre;
	}

	public function exchangeArray($data)
	{
		$this->est_id = (isset($data['EST_ID'])) ? $data['EST_ID'] : null;
		$this->pai_id = (isset($data['PAI_ID'])) ? $data['PAI_ID'] : null;
		$this->est_nombre = (isset($data['EST_NOMBRE'])) ? $data['EST_NOMBRE'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
