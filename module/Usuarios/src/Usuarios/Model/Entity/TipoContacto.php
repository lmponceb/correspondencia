<?php
namespace Usuarios\Model\Entity;

class TipoContacto {
	
	private $tip_con_id;
	private $tip_con_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $tip_con_id
	 */
	public function getTip_con_id() {
		return $this->tip_con_id;
	}

	/**
	 * @return the $tip_con_descripcion
	 */
	public function getTip_con_descripcion() {
		return $this->tip_con_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_con_id
	 */
	public function setTip_con_id($tip_con_id) {
		$this->tip_con_id = $tip_con_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_con_descripcion
	 */
	public function setTip_con_descripcion($tip_con_descripcion) {
		$this->tip_con_descripcion = $tip_con_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->tip_con_id = (isset($data['TIP_CON_ID'])) ? $data['TIP_CON_ID'] : null;
		$this->tip_con_descripcion = (isset($data['TIP_CON_DESCRIPCION'])) ? $data['TIP_CON_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
