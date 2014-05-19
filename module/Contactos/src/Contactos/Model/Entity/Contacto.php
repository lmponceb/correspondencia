<?php
namespace Contactos\Model\Entity;

class Contacto {
	
	private $con_id;
	private $ciu_id;
	private $emp_id;
	private $con_nombre;
	private $con_apellido;
	private $con_email;
	private $con_usuario;
	private $con_fecha_actualizacion;
	private $con_privado;
	private $con_fecha_nacimiento_personal;
	private $con_direccion_domicilio_per;
	private $con_email_personal;
	private $con_codigo_pais;
	private $con_codigo_ciudad;
	private $con_telefono_domicilio_per;
	private $con_celular_personal;
	private $con_observaciones;
	private $con_descripcion_es;
	private $con_descripcion_en;
	private $con_tip_per_es;
	private $con_tip_per_en;
	private $con_direccion;
	private $con_secretaria;
	private $con_secretaria_telfono;
	private $con_estado;
	
	private $estado;
	private $ciudad_nombre;
	private $estado_nombre;
	private $pais_nombre;
	private $empresa_nombre;
	private $sucursal_nombre;
	private $emp_emp_id;
	private $con_observaciones_privado;
	
	function __construct() {}

	/**
	 * @return the $con_id
	 */
	public function getCon_id() {
		return $this->con_id;
	}

	/**
	 * @return the $ciu_id
	 */
	public function getCiu_id() {
		return $this->ciu_id;
	}

	/**
	 * @return the $emp_id
	 */
	public function getEmp_id() {
		return $this->emp_id;
	}

	/**
	 * @return the $con_nombre
	 */
	public function getCon_nombre() {
		return $this->con_nombre;
	}

	/**
	 * @return the $con_apellido
	 */
	public function getCon_apellido() {
		return $this->con_apellido;
	}

	/**
	 * @return the $con_email
	 */
	public function getCon_email() {
		return $this->con_email;
	}

	/**
	 * @return the $con_usuario
	 */
	public function getCon_usuario() {
		return $this->con_usuario;
	}

	/**
	 * @return the $con_fecha_actualizacion
	 */
	public function getCon_fecha_actualizacion() {
		return $this->con_fecha_actualizacion;
	}

	/**
	 * @return the $con_privado
	 */
	public function getCon_privado() {
		return $this->con_privado;
	}

	/**
	 * @return the $con_fecha_nacimiento_personal
	 */
	public function getCon_fecha_nacimiento_personal() {
		return $this->con_fecha_nacimiento_personal;
	}

	/**
	 * @return the $con_direccion_domicilio_per
	 */
	public function getCon_direccion_domicilio_per() {
		return $this->con_direccion_domicilio_per;
	}

	/**
	 * @return the $con_email_personal
	 */
	public function getCon_email_personal() {
		return $this->con_email_personal;
	}

	/**
	 * @return the $con_codigo_pais
	 */
	public function getCon_codigo_pais() {
		return $this->con_codigo_pais;
	}

	/**
	 * @return the $con_codigo_ciudad
	 */
	public function getCon_codigo_ciudad() {
		return $this->con_codigo_ciudad;
	}

	/**
	 * @return the $con_telefono_domicilio_per
	 */
	public function getCon_telefono_domicilio_per() {
		return $this->con_telefono_domicilio_per;
	}

	/**
	 * @return the $con_celular_personal
	 */
	public function getCon_celular_personal() {
		return $this->con_celular_personal;
	}

	/**
	 * @return the $con_observaciones
	 */
	public function getCon_observaciones() {
		return $this->con_observaciones;
	}

	/**
	 * @return the $con_descripcion_es
	 */
	public function getCon_descripcion_es() {
		return $this->con_descripcion_es;
	}

	/**
	 * @return the $con_descripcion_en
	 */
	public function getCon_descripcion_en() {
		return $this->con_descripcion_en;
	}

	/**
	 * @return the $con_tip_per_es
	 */
	public function getCon_tip_per_es() {
		return $this->con_tip_per_es;
	}

	/**
	 * @return the $con_tip_per_en
	 */
	public function getCon_tip_per_en() {
		return $this->con_tip_per_en;
	}

	/**
	 * @return the $con_direccion
	 */
	public function getCon_direccion() {
		return $this->con_direccion;
	}

	/**
	 * @return the $con_secretaria
	 */
	public function getCon_secretaria() {
		return $this->con_secretaria;
	}

	/**
	 * @return the $con_secretaria_telfono
	 */
	public function getCon_secretaria_telfono() {
		return $this->con_secretaria_telfono;
	}

	/**
	 * @return the $con_estado
	 */
	public function getCon_estado() {
		return $this->con_estado;
	}

	/**
	 * @return the $estado
	 */
	public function getEstado() {
		return $this->estado;
	}

	/**
	 * @return the $ciudad_nombre
	 */
	public function getCiudad_nombre() {
		return $this->ciudad_nombre;
	}

	/**
	 * @return the $estado_nombre
	 */
	public function getEstado_nombre() {
		return $this->estado_nombre;
	}

	/**
	 * @return the $pais_nombre
	 */
	public function getPais_nombre() {
		return $this->pais_nombre;
	}

	/**
	 * @return the $empresa_nombre
	 */
	public function getEmpresa_nombre() {
		return $this->empresa_nombre;
	}

	/**
	 * @return the $sucursal_nombre
	 */
	public function getSucursal_nombre() {
		return $this->sucursal_nombre;
	}

	/**
	 * @return the $emp_emp_id
	 */
	public function getEmp_emp_id() {
		return $this->emp_emp_id;
	}

	/**
	 * @return the $con_observaciones_privado
	 */
	public function getCon_observaciones_privado() {
		return $this->con_observaciones_privado;
	}

	/**
	 * @param Ambigous <number, unknown> $con_id
	 */
	public function setCon_id($con_id) {
		$this->con_id = $con_id;
	}

	/**
	 * @param Ambigous <number, unknown> $ciu_id
	 */
	public function setCiu_id($ciu_id) {
		$this->ciu_id = $ciu_id;
	}

	/**
	 * @param Ambigous <number, unknown> $emp_id
	 */
	public function setEmp_id($emp_id) {
		$this->emp_id = $emp_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_nombre
	 */
	public function setCon_nombre($con_nombre) {
		$this->con_nombre = $con_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_apellido
	 */
	public function setCon_apellido($con_apellido) {
		$this->con_apellido = $con_apellido;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_email
	 */
	public function setCon_email($con_email) {
		$this->con_email = $con_email;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_usuario
	 */
	public function setCon_usuario($con_usuario) {
		$this->con_usuario = $con_usuario;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_fecha_actualizacion
	 */
	public function setCon_fecha_actualizacion($con_fecha_actualizacion) {
		$this->con_fecha_actualizacion = $con_fecha_actualizacion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_privado
	 */
	public function setCon_privado($con_privado) {
		$this->con_privado = $con_privado;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_fecha_nacimiento_personal
	 */
	public function setCon_fecha_nacimiento_personal($con_fecha_nacimiento_personal) {
		$this->con_fecha_nacimiento_personal = $con_fecha_nacimiento_personal;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_direccion_domicilio_per
	 */
	public function setCon_direccion_domicilio_per($con_direccion_domicilio_per) {
		$this->con_direccion_domicilio_per = $con_direccion_domicilio_per;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_email_personal
	 */
	public function setCon_email_personal($con_email_personal) {
		$this->con_email_personal = $con_email_personal;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_codigo_pais
	 */
	public function setCon_codigo_pais($con_codigo_pais) {
		$this->con_codigo_pais = $con_codigo_pais;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_codigo_ciudad
	 */
	public function setCon_codigo_ciudad($con_codigo_ciudad) {
		$this->con_codigo_ciudad = $con_codigo_ciudad;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_telefono_domicilio_per
	 */
	public function setCon_telefono_domicilio_per($con_telefono_domicilio_per) {
		$this->con_telefono_domicilio_per = $con_telefono_domicilio_per;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_celular_personal
	 */
	public function setCon_celular_personal($con_celular_personal) {
		$this->con_celular_personal = $con_celular_personal;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_observaciones
	 */
	public function setCon_observaciones($con_observaciones) {
		$this->con_observaciones = $con_observaciones;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_descripcion_es
	 */
	public function setCon_descripcion_es($con_descripcion_es) {
		$this->con_descripcion_es = $con_descripcion_es;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_descripcion_en
	 */
	public function setCon_descripcion_en($con_descripcion_en) {
		$this->con_descripcion_en = $con_descripcion_en;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_tip_per_es
	 */
	public function setCon_tip_per_es($con_tip_per_es) {
		$this->con_tip_per_es = $con_tip_per_es;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_tip_per_en
	 */
	public function setCon_tip_per_en($con_tip_per_en) {
		$this->con_tip_per_en = $con_tip_per_en;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_direccion
	 */
	public function setCon_direccion($con_direccion) {
		$this->con_direccion = $con_direccion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_secretaria
	 */
	public function setCon_secretaria($con_secretaria) {
		$this->con_secretaria = $con_secretaria;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_secretaria_telfono
	 */
	public function setCon_secretaria_telfono($con_secretaria_telfono) {
		$this->con_secretaria_telfono = $con_secretaria_telfono;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_estado
	 */
	public function setCon_estado($con_estado) {
		$this->con_estado = $con_estado;
	}

	/**
	 * @param field_type $estado
	 */
	public function setEstado($estado) {
		$this->estado = $estado;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ciudad_nombre
	 */
	public function setCiudad_nombre($ciudad_nombre) {
		$this->ciudad_nombre = $ciudad_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $estado_nombre
	 */
	public function setEstado_nombre($estado_nombre) {
		$this->estado_nombre = $estado_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $pais_nombre
	 */
	public function setPais_nombre($pais_nombre) {
		$this->pais_nombre = $pais_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $empresa_nombre
	 */
	public function setEmpresa_nombre($empresa_nombre) {
		$this->empresa_nombre = $empresa_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $sucursal_nombre
	 */
	public function setSucursal_nombre($sucursal_nombre) {
		$this->sucursal_nombre = $sucursal_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_emp_id
	 */
	public function setEmp_emp_id($emp_emp_id) {
		$this->emp_emp_id = $emp_emp_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_observaciones_privado
	 */
	public function setCon_observaciones_privado($con_observaciones_privado) {
		$this->con_observaciones_privado = $con_observaciones_privado;
	}

	public function exchangeArray($data)
	{
		$this->con_id = (isset($data['CON_ID'])) ? $data['CON_ID'] : 0;
		$this->ciu_id = (isset($data['CIU_ID'])) ? $data['CIU_ID'] : 0;
		$this->emp_id = (isset($data['EMP_ID'])) ? $data['EMP_ID'] : 0;
		$this->con_nombre = (isset($data['CON_NOMBRE'])) ? $data['CON_NOMBRE'] : null;
		$this->con_apellido = (isset($data['CON_APELLIDO'])) ? $data['CON_APELLIDO'] : null;
		$this->con_email = (isset($data['CON_EMAIL'])) ? $data['CON_EMAIL'] : null;
		$this->con_usuario = (isset($data['CON_USUARIO'])) ? $data['CON_USUARIO'] : null;
		$this->con_fecha_actualizacion = (isset($data['CON_FECHA_ACTUALIZACION'])) ? $data['CON_FECHA_ACTUALIZACION'] : null;
		$this->con_privado = (isset($data['CON_PRIVADO'])) ? $data['CON_PRIVADO'] : null;
		$this->con_fecha_nacimiento_personal = (isset($data['CON_FECHA_NACIMIENTO_PERSONAL'])) ? $data['CON_FECHA_NACIMIENTO_PERSONAL'] : null;
		$this->con_direccion_domicilio_per = (isset($data['CON_DIRECCION_DOMICILIO_PER'])) ? $data['CON_DIRECCION_DOMICILIO_PER'] : null;
		$this->con_email_personal = (isset($data['CON_EMAIL_PERSONAL'])) ? $data['CON_EMAIL_PERSONAL'] : null;
		$this->con_codigo_pais = (isset($data['CON_CODIGO_PAIS'])) ? $data['CON_CODIGO_PAIS'] : null;
		$this->con_codigo_ciudad = (isset($data['CON_CODIGO_CIUDAD'])) ? $data['CON_CODIGO_CIUDAD'] : null;
		$this->con_telefono_domicilio_per = (isset($data['CON_TELEFONO_DOMICILIO_PER'])) ? $data['CON_TELEFONO_DOMICILIO_PER'] : null;
		$this->con_celular_personal = (isset($data['CON_CELULAR_PERSONAL'])) ? $data['CON_CELULAR_PERSONAL'] : null; 
		$this->con_observaciones = (isset($data['CON_OBSERVACIONES'])) ? $data['CON_OBSERVACIONES'] : null;
		$this->con_descripcion_es = (isset($data['CON_DESCRIPCION_ES'])) ? $data['CON_DESCRIPCION_ES'] : null;
		$this->con_descripcion_en = (isset($data['CON_DESCRIPCION_EN'])) ? $data['CON_DESCRIPCION_EN'] : null;
		$this->con_tip_per_es = (isset($data['CON_TIP_PER_ES'])) ? $data['CON_TIP_PER_ES'] : null;
		$this->con_tip_per_en = (isset($data['CON_TIP_PER_EN'])) ? $data['CON_TIP_PER_EN'] : null;
		$this->con_direccion = (isset($data['CON_DIRECCION'])) ? $data['CON_DIRECCION'] : null;
		$this->con_secretaria = (isset($data['CON_SECRETARIA'])) ? $data['CON_SECRETARIA'] : null;
		$this->con_secretaria_telfono = (isset($data['CON_SECRETARIA_TELEFONO'])) ? $data['CON_SECRETARIA_TELEFONO'] : null;
		$this->con_estado = (isset($data['CON_ESTADO'])) ? $data['CON_ESTADO'] : null;
		
		$this->ciudad_nombre = (isset($data['CIU_NOMBRE'])) ? $data['CIU_NOMBRE'] : null;
		$this->estado_nombre = (isset($data['EST_NOMBRE'])) ? $data['EST_NOMBRE'] : null;
		$this->pais_nombre = (isset($data['PAI_NOMBRE'])) ? $data['PAI_NOMBRE'] : null;
		$this->empresa_nombre = (isset($data['EMP_NOMBRE'])) ? $data['EMP_NOMBRE'] : null;
		$this->sucursal_nombre = (isset($data['SUC_NOMBRE'])) ? $data['SUC_NOMBRE'] : null;
		$this->emp_emp_id = (isset($data['EMP_EMP_ID'])) ? $data['EMP_EMP_ID'] : null;
		$this->con_observaciones_privado = (isset($data['CON_OBSERVACIONES_PRIVADO'])) ? $data['CON_OBSERVACIONES_PRIVADO'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}