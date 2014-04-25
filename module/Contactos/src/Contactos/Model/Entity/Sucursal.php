<?php
namespace Contactos\Model\Entity;

class Sucursal {
	
	private $suc_id;
	private $emp_id;
	private $ciu_id;
	private $suc_nombre;
	private $suc_direccion;
	private $suc_referencia;
	private $suc_sector;
	private $suc_fecha_actualizacion;
	private $suc_usuario;
	
	
	function __construct() {}
	
	/**
	 * @return the $suc_id
	 */
	public function getSuc_id() {
		return $this->suc_id;
	}

	/**
	 * @return the $emp_id
	 */
	public function getEmp_id() {
		return $this->emp_id;
	}

	/**
	 * @return the $ciu_id
	 */
	public function getCiu_id() {
		return $this->ciu_id;
	}

	/**
	 * @return the $suc_nombre
	 */
	public function getSuc_nombre() {
		return $this->suc_nombre;
	}

	/**
	 * @return the $suc_direccion
	 */
	public function getSuc_direccion() {
		return $this->suc_direccion;
	}

	/**
	 * @return the $suc_referencia
	 */
	public function getSuc_referencia() {
		return $this->suc_referencia;
	}

	/**
	 * @return the $suc_sector
	 */
	public function getSuc_sector() {
		return $this->suc_sector;
	}

	/**
	 * @return the $suc_fecha_actualizacion
	 */
	public function getSuc_fecha_actualizacion() {
		return $this->suc_fecha_actualizacion;
	}

	/**
	 * @return the $suc_usuario
	 */
	public function getSuc_usuario() {
		return $this->suc_usuario;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_id
	 */
	public function setSuc_id($suc_id) {
		$this->suc_id = $suc_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_id
	 */
	public function setEmp_id($emp_id) {
		$this->emp_id = $emp_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ciu_id
	 */
	public function setCiu_id($ciu_id) {
		$this->ciu_id = $ciu_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_nombre
	 */
	public function setSuc_nombre($suc_nombre) {
		$this->suc_nombre = $suc_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_direccion
	 */
	public function setSuc_direccion($suc_direccion) {
		$this->suc_direccion = $suc_direccion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_referencia
	 */
	public function setSuc_referencia($suc_referencia) {
		$this->suc_referencia = $suc_referencia;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_sector
	 */
	public function setSuc_sector($suc_sector) {
		$this->suc_sector = $suc_sector;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_fecha_actualizacion
	 */
	public function setSuc_fecha_actualizacion($suc_fecha_actualizacion) {
		$this->suc_fecha_actualizacion = $suc_fecha_actualizacion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_usuario
	 */
	public function setSuc_usuario($suc_usuario) {
		$this->suc_usuario = $suc_usuario;
	}

	public function exchangeArray($data)
	{
		$this->suc_id = (isset($data['SUC_ID'])) ? $data['SUC_ID'] : null;
		$this->emp_id = (isset($data['EMP_ID'])) ? $data['EMP_ID'] : null;
		$this->ciu_id = (isset($data['CIU_ID'])) ? $data['CIU_ID'] : null;
		$this->suc_nombre = (isset($data['SUC_NOMBRE'])) ? $data['SUC_NOMBRE'] : null;
		$this->suc_direccion = (isset($data['SUC_DIRECCION'])) ? $data['SUC_DIRECCION'] : null;
		$this->suc_referencia = (isset($data['SUC_REFERENCIA'])) ? $data['SUC_REFERENCIA'] : null;
		$this->suc_sector = (isset($data['SUC_SECTOR'])) ? $data['SUC_SECTOR'] : null;
		$this->suc_fecha_actualizacion = (isset($data['SUC_FECHA_ACTUALIZACION'])) ? $data['SUC_FECHA_ACTUALIZACION'] : null;
		$this->suc_usuario = (isset($data['SUC_USUARIO'])) ? $data['SUC_USUARIO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
