<?php
namespace Cartas\Model\Entity;

class FeRecepcion {
	
	private $fe_rec_id;
	private $us_codigo;
	
	function __construct() {}

	/**
	 * @return the $fe_rec_id
	 */
	public function getFe_rec_id() {
		return $this->fe_rec_id;
	}

	/**
	 * @return the $us_codigo
	 */
	public function getUs_codigo() {
		return $this->us_codigo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_id
	 */
	public function setFe_rec_id($fe_rec_id) {
		$this->fe_rec_id = $fe_rec_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_codigo
	 */
	public function setUs_codigo($us_codigo) {
		$this->us_codigo = $us_codigo;
	}

	public function exchangeArray($data)
	{
		$this->fe_rec_id = (isset($data['FE_REC_ID'])) ? $data['FE_REC_ID'] : null;
		$this->us_codigo = (isset($data['US_CODIGO'])) ? $data['US_CODIGO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
