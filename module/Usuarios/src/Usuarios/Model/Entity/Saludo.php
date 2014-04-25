<?php
namespace Usuarios\Model\Entity;

class Saludo {
	
	private $sal_id;
	private $ctr_id;
	private $sal_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $sal_id
	 */
	public function getSal_id() {
		return $this->sal_id;
	}

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @return the $sal_descripcion
	 */
	public function getSal_descripcion() {
		return $this->sal_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $sal_id
	 */
	public function setSal_id($sal_id) {
		$this->sal_id = $sal_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $sal_descripcion
	 */
	public function setSal_descripcion($sal_descripcion) {
		$this->sal_descripcion = $sal_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->sal_id = (isset($data['SAL_ID'])) ? $data['SAL_ID'] : null;
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
		$this->sal_descripcion = (isset($data['SAL_DESCRIPCION'])) ? $data['SAL_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
