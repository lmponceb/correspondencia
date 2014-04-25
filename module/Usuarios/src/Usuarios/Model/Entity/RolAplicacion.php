<?php
namespace Usuarios\Model\Entity;

class RolAplicacion {
	
	private $rol_id;
	private $apl_id;
	private $rol_apl_visualizar;
	private $rol_apl_insertar;
	private $rol_apl_editar;
	private $rol_apl_eliminar;
	
	function __construct() {}
	
	/**
	 * @return the $rol_id
	 */
	public function getRol_id() {
		return $this->rol_id;
	}

	/**
	 * @return the $apl_id
	 */
	public function getApl_id() {
		return $this->apl_id;
	}

	/**
	 * @return the $rol_apl_visualizar
	 */
	public function getRol_apl_visualizar() {
		return $this->rol_apl_visualizar;
	}

	/**
	 * @return the $rol_apl_insertar
	 */
	public function getRol_apl_insertar() {
		return $this->rol_apl_insertar;
	}

	/**
	 * @return the $rol_apl_editar
	 */
	public function getRol_apl_editar() {
		return $this->rol_apl_editar;
	}

	/**
	 * @return the $rol_apl_eliminar
	 */
	public function getRol_apl_eliminar() {
		return $this->rol_apl_eliminar;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_id
	 */
	public function setRol_id($rol_id) {
		$this->rol_id = $rol_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $apl_id
	 */
	public function setApl_id($apl_id) {
		$this->apl_id = $apl_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_apl_visualizar
	 */
	public function setRol_apl_visualizar($rol_apl_visualizar) {
		$this->rol_apl_visualizar = $rol_apl_visualizar;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_apl_insertar
	 */
	public function setRol_apl_insertar($rol_apl_insertar) {
		$this->rol_apl_insertar = $rol_apl_insertar;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_apl_editar
	 */
	public function setRol_apl_editar($rol_apl_editar) {
		$this->rol_apl_editar = $rol_apl_editar;
	}

	/**
	 * @param Ambigous <NULL, unknown> $rol_apl_eliminar
	 */
	public function setRol_apl_eliminar($rol_apl_eliminar) {
		$this->rol_apl_eliminar = $rol_apl_eliminar;
	}

	public function exchangeArray($data)
	{
		$this->rol_id = (isset($data['ROL_ID'])) ? $data['ROL_ID'] : null;
		$this->apl_id = (isset($data['APL_ID'])) ? $data['APL_ID'] : null;
		$this->rol_apl_visualizar = (isset($data['ROL_APL_VISUALIZAR'])) ? $data['ROL_APL_VISUALIZAR'] : null;
		$this->rol_apl_insertar = (isset($data['ROL_APL_INSERTAR'])) ? $data['ROL_APL_INSERTAR'] : null;
		$this->rol_apl_editar = (isset($data['ROL_APL_EDITAR'])) ? $data['ROL_APL_EDITAR'] : null;
		$this->rol_apl_eliminar = (isset($data['ROL_APL_ELIMINAR'])) ? $data['ROL_APL_ELIMINAR'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
