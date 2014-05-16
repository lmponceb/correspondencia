<?php
namespace Application\Model\Entity;

class Usuario {
	
	private $usu_id;
	private $doc_id;
	private $usu_usuario;
	private $usu_email;
	private $usu_nombre;
	private $usu_clave;
	private $usu_estado;
	
	function __construct() {}
	
	/**
	 * @return the $usu_id
	 */
	public function getUsu_id() {
		return $this->usu_id;
	}

	/**
	 * @return the $doc_id
	 */
	public function getDoc_id() {
		return $this->doc_id;
	}

	/**
	 * @return the $usu_usuario
	 */
	public function getUsu_usuario() {
		return $this->usu_usuario;
	}

	/**
	 * @return the $usu_email
	 */
	public function getUsu_email() {
		return $this->usu_email;
	}

	/**
	 * @return the $usu_nombre
	 */
	public function getUsu_nombre() {
		return $this->usu_nombre;
	}

	/**
	 * @return the $usu_clave
	 */
	public function getUsu_clave() {
		return $this->usu_clave;
	}

	/**
	 * @return the $usu_estado
	 */
	public function getUsu_estado() {
		return $this->usu_estado;
	}

	/**
	 * @param Ambigous <NULL, unknown> $usu_id
	 */
	public function setUsu_id($usu_id) {
		$this->usu_id = $usu_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $doc_id
	 */
	public function setDoc_id($doc_id) {
		$this->doc_id = $doc_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $usu_usuario
	 */
	public function setUsu_usuario($usu_usuario) {
		$this->usu_usuario = $usu_usuario;
	}

	/**
	 * @param Ambigous <NULL, unknown> $usu_email
	 */
	public function setUsu_email($usu_email) {
		$this->usu_email = $usu_email;
	}

	/**
	 * @param Ambigous <NULL, unknown> $usu_nombre
	 */
	public function setUsu_nombre($usu_nombre) {
		$this->usu_nombre = $usu_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $usu_clave
	 */
	public function setUsu_clave($usu_clave) {
		$this->usu_clave = $usu_clave;
	}

	/**
	 * @param Ambigous <NULL, unknown> $usu_estado
	 */
	public function setUsu_estado($usu_estado) {
		$this->usu_estado = $usu_estado;
	}

	public function exchangeArray($data) {
		$this->usu_id = (isset ( $data ['usu_id'] )) ? $data ['usu_id'] : null;
		$this->doc_id = (isset ( $data ['doc_id'] )) ? $data ['doc_id'] : null;
		$this->usu_usuario = (isset ( $data ['usu_usuario'] )) ? $data ['usu_usuario'] : null;
		$this->usu_email = (isset ( $data ['usu_email'] )) ? $data ['usu_email'] : null;
		$this->usu_nombre = (isset ( $data ['usu_nombre'] )) ? $data ['usu_nombre'] : null;
		$this->usu_clave = (isset ( $data ['usu_clave'] )) ? $data ['usu_clave'] : null;
		$this->usu_estado = (isset ( $data ['usu_estado'] )) ? $data ['usu_estado'] : null;
	}
	public function getArrayCopy() {
		return get_object_vars ( $this );
	}
	
}