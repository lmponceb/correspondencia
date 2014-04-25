<?php
namespace Usuarios\Model\Entity;

class Proyecto {
	
	private $pro_id;
	private $pro_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $pro_id
	 */
	public function getPro_id() {
		return $this->pro_id;
	}

	/**
	 * @return the $pro_descripcion
	 */
	public function getPro_descripcion() {
		return $this->pro_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pro_id
	 */
	public function setPro_id($pro_id) {
		$this->pro_id = $pro_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pro_descripcion
	 */
	public function setPro_descripcion($pro_descripcion) {
		$this->pro_descripcion = $pro_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->pro_id = (isset($data['PRO_ID'])) ? $data['PRO_ID'] : null;
		$this->pro_descripcion = (isset($data['PRO_DESCRIPCION'])) ? $data['PRO_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
