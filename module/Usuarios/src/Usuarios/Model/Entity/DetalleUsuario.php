<?php
namespace Usuarios\Model\Entity;

class DetalleUsuario {
	
	private $us_codigo;
	private $det_usu_tipo;
	
	function __construct() {}
	
	/**
	 * @return the $us_codigo
	 */
	public function getUs_codigo() {
		return $this->us_codigo;
	}

	/**
	 * @return the $det_usu_tipo
	 */
	public function getDet_usu_tipo() {
		return $this->det_usu_tipo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_codigo
	 */
	public function setUs_codigo($us_codigo) {
		$this->us_codigo = $us_codigo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $det_usu_tipo
	 */
	public function setDet_usu_tipo($det_usu_tipo) {
		$this->det_usu_tipo = $det_usu_tipo;
	}

	public function exchangeArray($data)
	{
		$this->us_codigo = (isset($data['US_CODIGO'])) ? $data['US_CODIGO'] : null;
		$this->det_usu_tipo = (isset($data['DET_USU_TIPO'])) ? $data['DET_USU_TIPO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
