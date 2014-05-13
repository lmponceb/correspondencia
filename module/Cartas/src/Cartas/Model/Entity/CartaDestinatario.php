<?php
namespace Cartas\Model\Entity;

class CartaDestinatario {
	
	private $ctr_id;
	private $con_id;
	private $car_des_principal;
	
	function __construct() {}

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @return the $con_id
	 */
	public function getCon_id() {
		return $this->con_id;
	}

	/**
	 * @return the $car_des_principal
	 */
	public function getCar_des_principal() {
		return $this->car_des_principal;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_id
	 */
	public function setCon_id($con_id) {
		$this->con_id = $con_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_des_principal
	 */
	public function setCar_des_principal($car_des_principal) {
		$this->car_des_principal = $car_des_principal;
	}

	public function exchangeArray($data)
	{
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
		$this->con_id = (isset($data['CON_ID'])) ? $data['CON_ID'] : null;
		$this->car_des_principal = (isset($data['CAR_DES_PRINCIPAL'])) ? $data['CAR_DES_PRINCIPAL'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
