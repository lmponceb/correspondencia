<?php
namespace Parametros\Model\Entity;

class Ciudad {
	
	private $ciu_id;
	private $est_id;
	private $ciu_nombre;
	private $ciu_codigo_telefono;
	private $est_nombre;
	
	function __construct() {}
	
	/**
	 * @return the $ciu_id
	 */
	public function getCiu_id() {
		return $this->ciu_id;
	}

	/**
	 * @return the $est_id
	 */
	public function getEst_id() {
		return $this->est_id;
	}

	/**
	 * @return the $ciu_nombre
	 */
	public function getCiu_nombre() {
		return $this->ciu_nombre;
	}

	/**
	 * @return the $ciu_codigo_telefono
	 */
	public function getCiu_codigo_telefono() {
		return $this->ciu_codigo_telefono;
	}

	/**
	 * @return the $est_nombre
	 */
	public function getEst_nombre() {
		return $this->est_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ciu_id
	 */
	public function setCiu_id($ciu_id) {
		$this->ciu_id = $ciu_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $est_id
	 */
	public function setEst_id($est_id) {
		$this->est_id = $est_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ciu_nombre
	 */
	public function setCiu_nombre($ciu_nombre) {
		$this->ciu_nombre = $ciu_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ciu_codigo_telefono
	 */
	public function setCiu_codigo_telefono($ciu_codigo_telefono) {
		$this->ciu_codigo_telefono = $ciu_codigo_telefono;
	}

	/**
	 * @param Ambigous <NULL, unknown> $est_nombre
	 */
	public function setEst_nombre($est_nombre) {
		$this->est_nombre = $est_nombre;
	}

	public function exchangeArray($data)
	{
		$this->ciu_id = (isset($data['CIU_ID'])) ? $data['CIU_ID'] : null;
		$this->est_id = (isset($data['EST_ID'])) ? $data['EST_ID'] : null;
		$this->ciu_nombre = (isset($data['CIU_NOMBRE'])) ? $data['CIU_NOMBRE'] : null;
		$this->ciu_codigo_telefono = (isset($data['CIU_CODIGO_TELEFONO'])) ? $data['CIU_CODIGO_TELEFONO'] : null;
		$this->est_nombre = (isset($data['EST_NOMBRE'])) ? $data['EST_NOMBRE'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
