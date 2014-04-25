<?php
namespace Usuarios\Model\Entity;

class Despedida {
	
	private $des_id;
	private $ctr_id;
	private $des_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $des_id
	 */
	public function getDes_id() {
		return $this->des_id;
	}

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @return the $des_descripcion
	 */
	public function getDes_descripcion() {
		return $this->des_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $des_id
	 */
	public function setDes_id($des_id) {
		$this->des_id = $des_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $des_descripcion
	 */
	public function setDes_descripcion($des_descripcion) {
		$this->des_descripcion = $des_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->des_id = (isset($data['DES_ID'])) ? $data['DES_ID'] : null;
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
		$this->des_descripcion = (isset($data['DES_DESCRIPCION'])) ? $data['DES_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
