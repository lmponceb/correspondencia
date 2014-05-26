<?php
namespace Cartas\Model\Entity;

class TransferenciaSueldo {
	
	private $tra_sue_id;
	private $ctr_id;
	private $tra_sue_valor_debito;
    private $tra_sue_numero_creditos;
    private $tra_sue_valor_maximo;
	
	function __construct() {}

	/**
	 * @return the $tra_sue_id
	 */
	public function getTra_sue_id() {
		return $this->tra_sue_id;
	}

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @return the $tra_sue_valor_debito
	 */
	public function getTra_sue_valor_debito() {
		return $this->tra_sue_valor_debito;
	}

	/**
	 * @return the $tra_sue_numero_creditos
	 */
	public function getTra_sue_numero_creditos() {
		return $this->tra_sue_numero_creditos;
	}

	/**
	 * @return the $tra_sue_valor_maximo
	 */
	public function getTra_sue_valor_maximo() {
		return $this->tra_sue_valor_maximo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_sue_id
	 */
	public function setTra_sue_id($tra_sue_id) {
		$this->tra_sue_id = $tra_sue_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_sue_valor_debito
	 */
	public function setTra_sue_valor_debito($tra_sue_valor_debito) {
		$this->tra_sue_valor_debito = $tra_sue_valor_debito;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_sue_numero_creditos
	 */
	public function setTra_sue_numero_creditos($tra_sue_numero_creditos) {
		$this->tra_sue_numero_creditos = $tra_sue_numero_creditos;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_sue_valor_maximo
	 */
	public function setTra_sue_valor_maximo($tra_sue_valor_maximo) {
		$this->tra_sue_valor_maximo = $tra_sue_valor_maximo;
	}

	public function exchangeArray($data)
	{
		$this->tra_sue_id = (isset($data['TRA_SUE_ID'])) ? $data['TRA_SUE_ID'] : null;
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
		$this->tra_sue_valor_debito = (isset($data['TRA_SUE_VALOR_DEBITO'])) ? $data['TRA_SUE_VALOR_DEBITO'] : null;
		$this->tra_sue_numero_creditos = (isset($data['TRA_SUE_NUMERO_CREDITOS'])) ? $data['TRA_SUE_NUMERO_CREDITOS'] : null;
		$this->tra_sue_valor_maximo = (isset($data['TRA_SUE_VALOR_MAXIMO'])) ? $data['TRA_SUE_VALOR_MAXIMO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}