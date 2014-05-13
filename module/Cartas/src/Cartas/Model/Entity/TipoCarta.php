<?php
namespace Cartas\Model\Entity;

class TipoCarta {
	
	private $tip_car_id;
	private $tip_car_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $tip_car_id
	 */
	public function getTip_car_id() {
		return $this->tip_car_id;
	}

	/**
	 * @return the $tip_car_descripcion
	 */
	public function getTip_car_descripcion() {
		return $this->tip_car_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_car_id
	 */
	public function setTip_car_id($tip_car_id) {
		$this->tip_car_id = $tip_car_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_car_descripcion
	 */
	public function setTip_car_descripcion($tip_car_descripcion) {
		$this->tip_car_descripcion = $tip_car_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->tip_car_id = (isset($data['TIP_CAR_ID'])) ? $data['TIP_CAR_ID'] : null;
		$this->tip_car_descripcion = (isset($data['TIP_CAR_DESCRIPCION'])) ? $data['TIP_CAR_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}