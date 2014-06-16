<?php
namespace Contactos\Model\Entity;

class TipoTelefono {
	
	private $tip_tel_id;
	private $tip_tel_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $pai_id
	 */
	public function getTip_tel_id() {
		return $this->tip_tel_id;
	}

	/**
	 * @return the $pai_nombre
	 */
	public function getTip_tel_descripcion() {
		return $this->tip_tel_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pai_id
	 */
	public function setTip_tel_id($tip_tel_id) {
		$this->tip_tel_id = $tip_tel_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pai_nombre
	 */
	public function setTip_tel_descripcion($tip_tel_descripcion) {
		$this->tip_tel_descripcion = $tip_tel_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->tip_tel_id = (isset($data['TIP_TEL_ID'])) ? $data['TIP_TEL_ID'] : null;
		$this->tip_tel_descripcion = (isset($data['TIP_TEL_DESCRIPCION'])) ? $data['TIP_TEL_DESCRIPCION'] : null;
	}
	
}
