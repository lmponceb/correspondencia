<?php
namespace Usuarios\Model\Entity;

class Obra {
	
	private $obr_id;
	private $pro_id;
	private $obr_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $obr_id
	 */
	public function getObr_id() {
		return $this->obr_id;
	}

	/**
	 * @return the $pro_id
	 */
	public function getPro_id() {
		return $this->pro_id;
	}

	/**
	 * @return the $obr_descripcion
	 */
	public function getObr_descripcion() {
		return $this->obr_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $obr_id
	 */
	public function setObr_id($obr_id) {
		$this->obr_id = $obr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pro_id
	 */
	public function setPro_id($pro_id) {
		$this->pro_id = $pro_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $obr_descripcion
	 */
	public function setObr_descripcion($obr_descripcion) {
		$this->obr_descripcion = $obr_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->obr_id = (isset($data['OBR_ID'])) ? $data['OBR_ID'] : null;
		$this->pro_id = (isset($data['PRO_ID'])) ? $data['PRO_ID'] : null;
		$this->obr_descripcion = (isset($data['OBR_DESCRIPCION'])) ? $data['OBR_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
