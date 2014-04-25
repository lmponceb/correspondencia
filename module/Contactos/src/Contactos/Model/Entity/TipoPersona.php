<?php
namespace Contactos\Model\Entity;

class TipoPersona {
	
	private $tip_per_id;
	private $tip_per_descripcion_es;
	private $tip_per_descripcion_en;
	
	function __construct() {}
	
	/**
	 * @return the $tip_per_id
	 */
	public function getTip_per_id() {
		return $this->tip_per_id;
	}

	/**
	 * @return the $tip_per_descripcion_es
	 */
	public function getTip_per_descripcion_es() {
		return $this->tip_per_descripcion_es;
	}

	/**
	 * @return the $tip_per_descripcion_en
	 */
	public function getTip_per_descripcion_en() {
		return $this->tip_per_descripcion_en;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_per_id
	 */
	public function setTip_per_id($tip_per_id) {
		$this->tip_per_id = $tip_per_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_per_descripcion_es
	 */
	public function setTip_per_descripcion_es($tip_per_descripcion_es) {
		$this->tip_per_descripcion_es = $tip_per_descripcion_es;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_per_descripcion_en
	 */
	public function setTip_per_descripcion_en($tip_per_descripcion_en) {
		$this->tip_per_descripcion_en = $tip_per_descripcion_en;
	}

	public function exchangeArray($data)
	{
		$this->tip_per_id = (isset($data['TIP_PER_ID'])) ? $data['TIP_PER_ID'] : null;
		$this->tip_per_descripcion_es = (isset($data['TIP_PER_DESCRIPCION_ES'])) ? $data['TIP_PER_DESCRIPCION_ES'] : null;
		$this->tip_per_descripcion_en = (isset($data['TIP_PER_DESCRIPCION_EN'])) ? $data['TIP_PER_DESCRIPCION_EN'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
