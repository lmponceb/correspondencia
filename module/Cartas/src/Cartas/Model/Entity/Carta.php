<?php
namespace Cartas\Model\Entity;

class Carta {
	
	private $ctr_id;
	private $pro_id;
	private $emp_int_id;
	private $us_codigo;
	private $tip_car_id;
	private $ctr_idioma;
	private $ctr_fecha_creacion;
	private $ctr_cuerpo;
	private $ctr_codigo_final;
	private $ctr_fecha_actualizacion;
	private $ctr_referencia;
	private $ctr_saludo;
	private $ctr_despedida;
	private $ctr_tipo;
	private $ctr_estado;
	private $ctr_activar_direccion;
	private $ctr_direccion_empresa;
	
	private $tip_car_descripcion; 
	private $emp_int_nombre;
	private $emp_int_abreviacion;
	
	function __construct() {}
	

	/**
	 * @return the $ctr_id
	 */
	public function getCtr_id() {
		return $this->ctr_id;
	}

	/**
	 * @return the $pro_id
	 */
	public function getPro_id() {
		return $this->pro_id;
	}

	/**
	 * @return the $emp_int_id
	 */
	public function getEmp_int_id() {
		return $this->emp_int_id;
	}

	/**
	 * @return the $us_codigo
	 */
	public function getUs_codigo() {
		return $this->us_codigo;
	}

	/**
	 * @return the $tip_car_id
	 */
	public function getTip_car_id() {
		return $this->tip_car_id;
	}

	/**
	 * @return the $ctr_idioma
	 */
	public function getCtr_idioma() {
		return $this->ctr_idioma;
	}

	/**
	 * @return the $ctr_fecha_creacion
	 */
	public function getCtr_fecha_creacion() {
		return $this->ctr_fecha_creacion;
	}

	/**
	 * @return the $ctr_cuerpo
	 */
	public function getCtr_cuerpo() {
		return $this->ctr_cuerpo;
	}

	/**
	 * @return the $ctr_codigo_final
	 */
	public function getCtr_codigo_final() {
		return $this->ctr_codigo_final;
	}

	/**
	 * @return the $ctr_fecha_actualizacion
	 */
	public function getCtr_fecha_actualizacion() {
		return $this->ctr_fecha_actualizacion;
	}

	/**
	 * @return the $ctr_referencia
	 */
	public function getCtr_referencia() {
		return $this->ctr_referencia;
	}

	/**
	 * @return the $ctr_saludo
	 */
	public function getCtr_saludo() {
		return $this->ctr_saludo;
	}

	/**
	 * @return the $ctr_despedida
	 */
	public function getCtr_despedida() {
		return $this->ctr_despedida;
	}

	/**
	 * @return the $ctr_tipo
	 */
	public function getCtr_tipo() {
		return $this->ctr_tipo;
	}

	/**
	 * @return the $ctr_estado
	 */
	public function getCtr_estado() {
		return $this->ctr_estado;
	}

	/**
	 * @return the $ctr_activar_direccion
	 */
	public function getCtr_activar_direccion() {
		return $this->ctr_activar_direccion;
	}

	/**
	 * @return the $ctr_direccion_empresa
	 */
	public function getCtr_direccion_empresa() {
		return $this->ctr_direccion_empresa;
	}

	/**
	 * @return the $tip_car_descripcion
	 */
	public function getTip_car_descripcion() {
		return $this->tip_car_descripcion;
	}

	/**
	 * @return the $emp_int_nombre
	 */
	public function getEmp_int_nombre() {
		return $this->emp_int_nombre;
	}

	/**
	 * @return the $emp_int_abreviacion
	 */
	public function getEmp_int_abreviacion() {
		return $this->emp_int_abreviacion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_id
	 */
	public function setCtr_id($ctr_id) {
		$this->ctr_id = $ctr_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pro_id
	 */
	public function setPro_id($pro_id) {
		$this->pro_id = $pro_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_id
	 */
	public function setEmp_int_id($emp_int_id) {
		$this->emp_int_id = $emp_int_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_codigo
	 */
	public function setUs_codigo($us_codigo) {
		$this->us_codigo = $us_codigo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_car_id
	 */
	public function setTip_car_id($tip_car_id) {
		$this->tip_car_id = $tip_car_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_idioma
	 */
	public function setCtr_idioma($ctr_idioma) {
		$this->ctr_idioma = $ctr_idioma;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_fecha_creacion
	 */
	public function setCtr_fecha_creacion($ctr_fecha_creacion) {
		$this->ctr_fecha_creacion = $ctr_fecha_creacion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_cuerpo
	 */
	public function setCtr_cuerpo($ctr_cuerpo) {
		$this->ctr_cuerpo = $ctr_cuerpo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_codigo_final
	 */
	public function setCtr_codigo_final($ctr_codigo_final) {
		$this->ctr_codigo_final = $ctr_codigo_final;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_fecha_actualizacion
	 */
	public function setCtr_fecha_actualizacion($ctr_fecha_actualizacion) {
		$this->ctr_fecha_actualizacion = $ctr_fecha_actualizacion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_referencia
	 */
	public function setCtr_referencia($ctr_referencia) {
		$this->ctr_referencia = $ctr_referencia;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_saludo
	 */
	public function setCtr_saludo($ctr_saludo) {
		$this->ctr_saludo = $ctr_saludo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_despedida
	 */
	public function setCtr_despedida($ctr_despedida) {
		$this->ctr_despedida = $ctr_despedida;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_tipo
	 */
	public function setCtr_tipo($ctr_tipo) {
		$this->ctr_tipo = $ctr_tipo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_estado
	 */
	public function setCtr_estado($ctr_estado) {
		$this->ctr_estado = $ctr_estado;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_activar_direccion
	 */
	public function setCtr_activar_direccion($ctr_activar_direccion) {
		$this->ctr_activar_direccion = $ctr_activar_direccion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ctr_direccion_empresa
	 */
	public function setCtr_direccion_empresa($ctr_direccion_empresa) {
		$this->ctr_direccion_empresa = $ctr_direccion_empresa;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_car_descripcion
	 */
	public function setTip_car_descripcion($tip_car_descripcion) {
		$this->tip_car_descripcion = $tip_car_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_nombre
	 */
	public function setEmp_int_nombre($emp_int_nombre) {
		$this->emp_int_nombre = $emp_int_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_abreviacion
	 */
	public function setEmp_int_abreviacion($emp_int_abreviacion) {
		$this->emp_int_abreviacion = $emp_int_abreviacion;
	}

	public function exchangeArray($data)
	{
		$this->ctr_id = (isset($data['CTR_ID'])) ? $data['CTR_ID'] : null;
		$this->pro_id = (isset($data['PRO_ID'])) ? $data['PRO_ID'] : null;
		$this->emp_int_id = (isset($data['EMP_INT_ID'])) ? $data['EMP_INT_ID'] : null;
		$this->us_codigo = (isset($data['US_CODIGO'])) ? $data['US_CODIGO'] : null;
		$this->tip_car_id = (isset($data['TIP_CAR_ID'])) ? $data['TIP_CAR_ID'] : null;
		$this->ctr_idioma = (isset($data['CTR_IDIOMA'])) ? $data['CTR_IDIOMA'] : null;
		$this->ctr_fecha_creacion = (isset($data['CTR_FECHA_CREACION'])) ? $data['CTR_FECHA_CREACION'] : null;
		$this->ctr_cuerpo = (isset($data['CTR_CUERPO'])) ? $data['CTR_CUERPO'] : null;
		$this->ctr_codigo_final = (isset($data['CTR_CODIGO_FINAL'])) ? $data['CTR_CODIGO_FINAL'] : null;
		$this->ctr_fecha_actualizacion = (isset($data['CTR_FECHA_ACTUALIZACION'])) ? $data['CTR_FECHA_ACTUALIZACION'] : null;
		$this->ctr_referencia = (isset($data['CTR_REFERENCIA'])) ? $data['CTR_REFERENCIA'] : null;
		$this->ctr_saludo = (isset($data['CTR_SALUDO'])) ? $data['CTR_SALUDO'] : null;
		$this->ctr_despedida = (isset($data['CTR_DESPEDIDA'])) ? $data['CTR_DESPEDIDA'] : null;
		$this->ctr_tipo = (isset($data['CTR_TIPO'])) ? $data['CTR_TIPO'] : null;
		$this->ctr_estado = (isset($data['CTR_ESTADO'])) ? $data['CTR_ESTADO'] : null;
		$this->ctr_activar_direccion = (isset($data['CTR_ACTIVAR_DIRECCION'])) ? $data['CTR_ACTIVAR_DIRECCION'] : null;
		$this->ctr_direccion_empresa = (isset($data['CTR_DIRECCION_EMPRESA'])) ? $data['CTR_DIRECCION_EMPRESA'] : null;
		
		$this->tip_car_descripcion = (isset($data['TIP_CAR_DESCRIPCION'])) ? $data['TIP_CAR_DESCRIPCION'] : null;
		$this->emp_int_nombre = (isset($data['EMP_INT_NOMBRE'])) ? $data['EMP_INT_NOMBRE'] : null;
		$this->emp_int_abreviacion = (isset($data['EMP_INT_ABREVIACION'])) ? $data['EMP_INT_ABREVIACION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}