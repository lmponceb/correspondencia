<?php
namespace Contactos\Model\Entity;

class Cargo {
	
	private $car_id;
	private $car_descripcion_es;
	private $car_descripcion_en;
	
	function __construct() {}
	
	/**
	 * @return the $car_id
	 */
	public function getCar_id() {
		return $this->car_id;
	}

	/**
	 * @return the $car_descripcion_es
	 */
	public function getCar_descripcion_es() {
		return $this->car_descripcion_es;
	}

	/**
	 * @return the $car_descripcion_en
	 */
	public function getCar_descripcion_en() {
		return $this->car_descripcion_en;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_id
	 */
	public function setCar_id($car_id) {
		$this->car_id = $car_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_descripcion_es
	 */
	public function setCar_descripcion_es($car_descripcion_es) {
		$this->car_descripcion_es = $car_descripcion_es;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_descripcion_en
	 */
	public function setCar_descripcion_en($car_descripcion_en) {
		$this->car_descripcion_en = $car_descripcion_en;
	}

	public function exchangeArray($data)
	{
		$this->car_id = (isset($data['CAR_ID'])) ? $data['CAR_ID'] : null;
		$this->car_descripcion_es = (isset($data['CAR_DESCRIPCION_ES'])) ? $data['CAR_DESCRIPCION_ES'] : null;
		$this->car_descripcion_en = (isset($data['CAR_DESCRIPCION_EN'])) ? $data['CAR_DESCRIPCION_EN'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
