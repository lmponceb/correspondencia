<?php
namespace Cartas\Model\Entity;

class CartaFirma {
	
	private $epl_id;
	private $ctr_id;
	
	function __construct() {}

	/**
	 * @return the $epl_id
	 */
	public function getEpl_id() {
		return $this->epl_id;
	}

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $epl_id
	 */
	public function setEpl_id($epl_id) {
		$this->epl_id = $epl_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	public function exchangeArray($data)
	{
		$this->epl_id = (isset($data['EPL_ID'])) ? $data['EPL_ID'] : null;
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
