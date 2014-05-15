<?php
namespace Cartas\Model\Entity;

class CartaFirma {
	
	private $car_fir_id;
	private $epl_id;
	private $ctr_id;
	
	function __construct() {}

	/**
	 * @return the $car_fir_id
	 */
	public function getCar_fir_id() {
		return $this->car_fir_id;
	}

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
	 * @param Ambigous <NULL, unknown> $car_fir_id
	 */
	public function setCar_fir_id($car_fir_id) {
		$this->car_fir_id = $car_fir_id;
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
		$this->car_fir_id = (isset($data['CAR_FIR_ID'])) ? $data['CAR_FIR_ID'] : null;
		$this->epl_id = (isset($data['EPL_ID'])) ? $data['EPL_ID'] : null;
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}