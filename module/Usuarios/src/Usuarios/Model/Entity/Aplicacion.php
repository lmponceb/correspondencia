<?php
namespace Usuarios\Model\Entity;

class Aplicacion {
	
	private $apl_id;
	private $apl_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $apl_id
	 */
	public function getApl_id() {
		return $this->apl_id;
	}

	/**
	 * @return the $apl_descripcion
	 */
	public function getApl_descripcion() {
		return $this->apl_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $apl_id
	 */
	public function setApl_id($apl_id) {
		$this->apl_id = $apl_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $apl_descripcion
	 */
	public function setApl_descripcion($apl_descripcion) {
		$this->apl_descripcion = $apl_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->apl_id = (isset($data['APL_ID'])) ? $data['APL_ID'] : null;
		$this->apl_descripcion = (isset($data['APL_DESCRIPCION'])) ? $data['APL_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
