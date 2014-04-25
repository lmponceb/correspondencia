<?php
namespace Usuarios\Model\Entity;

class ContactoRelacionado {
	
	private $con_rel_id;
	private $tip_con_id;
	private $con_id;
	private $con_rel_valor;
	
	function __construct() {}
	
	/**
	 * @return the $con_rel_id
	 */
	public function getCon_rel_id() {
		return $this->con_rel_id;
	}

	/**
	 * @return the $tip_con_id
	 */
	public function getTip_con_id() {
		return $this->tip_con_id;
	}

	/**
	 * @return the $con_id
	 */
	public function getCon_id() {
		return $this->con_id;
	}

	/**
	 * @return the $con_rel_valor
	 */
	public function getCon_rel_valor() {
		return $this->con_rel_valor;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_rel_id
	 */
	public function setCon_rel_id($con_rel_id) {
		$this->con_rel_id = $con_rel_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_con_id
	 */
	public function setTip_con_id($tip_con_id) {
		$this->tip_con_id = $tip_con_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_id
	 */
	public function setCon_id($con_id) {
		$this->con_id = $con_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_rel_valor
	 */
	public function setCon_rel_valor($con_rel_valor) {
		$this->con_rel_valor = $con_rel_valor;
	}

	public function exchangeArray($data)
	{
		$this->con_rel_id = (isset($data['CON_REL_ID'])) ? $data['CON_REL_ID'] : null;
		$this->tip_con_id = (isset($data['TIP_CON_ID'])) ? $data['TIP_CON_ID'] : null;
		$this->con_id = (isset($data['CON_ID'])) ? $data['CON_ID'] : null;
		$this->con_rel_valor = (isset($data['CON_REL_VALOR'])) ? $data['CON_REL_VALOR'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
