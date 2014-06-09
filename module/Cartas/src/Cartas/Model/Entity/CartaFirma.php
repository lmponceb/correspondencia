<?php
namespace Cartas\Model\Entity;

class CartaFirma {
	
	private $car_fir_id;
	private $ctr_id;
	private $car_fir_tipo;
	private $car_fir_nombre;
	private $car_fir_cargo;
	
// 	private $epl_nombre;
// 	private $epl_apellido;
// 	private $epl_cargo;
	
	function __construct() {}

	/**
	 * @return the $car_fir_id
	 */
	public function getCar_fir_id() {
		return $this->car_fir_id;
	}

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @return the $car_fir_tipo
	 */
	public function getCar_fir_tipo() {
		return $this->car_fir_tipo;
	}

	/**
	 * @return the $car_fir_nombre
	 */
	public function getCar_fir_nombre() {
		return $this->car_fir_nombre;
	}

	/**
	 * @return the $car_fir_cargo
	 */
	public function getCar_fir_cargo() {
		return $this->car_fir_cargo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_fir_id
	 */
	public function setCar_fir_id($car_fir_id) {
		$this->car_fir_id = $car_fir_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_fir_tipo
	 */
	public function setCar_fir_tipo($car_fir_tipo) {
		$this->car_fir_tipo = $car_fir_tipo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_fir_nombre
	 */
	public function setCar_fir_nombre($car_fir_nombre) {
		$this->car_fir_nombre = $car_fir_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_fir_cargo
	 */
	public function setCar_fir_cargo($car_fir_cargo) {
		$this->car_fir_cargo = $car_fir_cargo;
	}

	public function exchangeArray($data)
	{
		$this->car_fir_id = (isset($data['CAR_FIR_ID'])) ? $data['CAR_FIR_ID'] : null;
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
		$this->car_fir_tipo = (isset($data['CAR_FIR_TIPO'])) ? $data['CAR_FIR_TIPO'] : null;
		$this->car_fir_nombre = (isset($data['CAR_FIR_NOMBRE'])) ? $data['CAR_FIR_NOMBRE'] : null;
		$this->car_fir_cargo = (isset($data['CAR_FIR_CARGO'])) ? $data['CAR_FIR_CARGO'] : null;
		
// 		$this->epl_nombre = (isset($data['EPL_NOMBRE'])) ? $data['EPL_NOMBRE'] : null;
// 		$this->epl_apellido = (isset($data['EPL_APELLIDO'])) ? $data['EPL_APELLIDO'] : null;
// 		$this->epl_cargo = (isset($data['EPL_CARGO'])) ? $data['EPL_CARGO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}