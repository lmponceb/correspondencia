<?php
namespace Cartas\Model\Entity;

class TransaccionBancaria {
	
	private $tra_ban_id;
	private $ctr_id;
	private $tra_ban_beneficiario;
    private $tra_ban_direccion;
	private $tra_ban_cuenta;
	private $tra_ban_valor;
	private $tra_ban_aba;
	private $tra_ban_banco;
	private $tra_ban_banco_linea_dos;
	private $tra_ban_banco_direccion;
	
	
	function __construct() {}
	

	/**
	 * @return the $tra_ban_id
	 */
	public function getTra_ban_id() {
		return $this->tra_ban_id;
	}

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @return the $tra_ban_beneficiario
	 */
	public function getTra_ban_beneficiario() {
		return $this->tra_ban_beneficiario;
	}

	/**
	 * @return the $tra_ban_direccion
	 */
	public function getTra_ban_direccion() {
		return $this->tra_ban_direccion;
	}

	/**
	 * @return the $tra_ban_cuenta
	 */
	public function getTra_ban_cuenta() {
		return $this->tra_ban_cuenta;
	}

	/**
	 * @return the $tra_ban_valor
	 */
	public function getTra_ban_valor() {
		return $this->tra_ban_valor;
	}

	/**
	 * @return the $tra_ban_aba
	 */
	public function getTra_ban_aba() {
		return $this->tra_ban_aba;
	}

	/**
	 * @return the $tra_ban_banco
	 */
	public function getTra_ban_banco() {
		return $this->tra_ban_banco;
	}

	/**
	 * @return the $tra_ban_banco_linea_dos
	 */
	public function getTra_ban_banco_linea_dos() {
		return $this->tra_ban_banco_linea_dos;
	}

	/**
	 * @return the $tra_ban_banco_direccion
	 */
	public function getTra_ban_banco_direccion() {
		return $this->tra_ban_banco_direccion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_id
	 */
	public function setTra_ban_id($tra_ban_id) {
		$this->tra_ban_id = $tra_ban_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_beneficiario
	 */
	public function setTra_ban_beneficiario($tra_ban_beneficiario) {
		$this->tra_ban_beneficiario = $tra_ban_beneficiario;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_direccion
	 */
	public function setTra_ban_direccion($tra_ban_direccion) {
		$this->tra_ban_direccion = $tra_ban_direccion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_cuenta
	 */
	public function setTra_ban_cuenta($tra_ban_cuenta) {
		$this->tra_ban_cuenta = $tra_ban_cuenta;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_valor
	 */
	public function setTra_ban_valor($tra_ban_valor) {
		$this->tra_ban_valor = $tra_ban_valor;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_aba
	 */
	public function setTra_ban_aba($tra_ban_aba) {
		$this->tra_ban_aba = $tra_ban_aba;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_banco
	 */
	public function setTra_ban_banco($tra_ban_banco) {
		$this->tra_ban_banco = $tra_ban_banco;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_banco_linea_dos
	 */
	public function setTra_ban_banco_linea_dos($tra_ban_banco_linea_dos) {
		$this->tra_ban_banco_linea_dos = $tra_ban_banco_linea_dos;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tra_ban_banco_direccion
	 */
	public function setTra_ban_banco_direccion($tra_ban_banco_direccion) {
		$this->tra_ban_banco_direccion = $tra_ban_banco_direccion;
	}

	public function exchangeArray($data)
	{
		$this->tra_ban_id = (isset($data['TRA_BAN_ID'])) ? $data['TRA_BAN_ID'] : null;
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
		$this->tra_ban_beneficiario = (isset($data['TRA_BAN_BENEFICIARIO'])) ? $data['TRA_BAN_BENEFICIARIO'] : null;
		$this->tra_ban_direccion = (isset($data['TRA_BAN_DIRECCION'])) ? $data['TRA_BAN_DIRECCION'] : null;
		$this->tra_ban_cuenta = (isset($data['TRA_BAN_CUENTA'])) ? $data['TRA_BAN_CUENTA'] : null;
		$this->tra_ban_valor = (isset($data['TRA_BAN_VALOR'])) ? $data['TRA_BAN_VALOR'] : null;
		$this->tra_ban_aba = (isset($data['TRA_BAN_ABA'])) ? $data['TRA_BAN_ABA'] : null;
		$this->tra_ban_banco = (isset($data['TRA_BAN_BANCO'])) ? $data['TRA_BAN_BANCO'] : null;
		$this->tra_ban_banco_linea_dos = (isset($data['TRA_BAN_BANCO_LINEA_DOS'])) ? $data['TRA_BAN_BANCO_LINEA_DOS'] : null;
		$this->tra_ban_banco_direccion = (isset($data['TRA_BAN_BANCO_DIRECCION'])) ? $data['TRA_BAN_BANCO_DIRECCION'] : null;
	
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}