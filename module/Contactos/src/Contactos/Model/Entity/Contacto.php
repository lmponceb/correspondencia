<?php
namespace Contactos\Model\Entity;

use Contactos\Model\Entity\Ciudad as City;

class Contacto {
	
	private $con_id;
	private $car_id;
	private $tip_per_id;
	private $ciu_id;
	private $emp_id;
	private $con_nombre;
	private $con_apellido;
	private $con_email;
	private $con_observaciones;
	private $con_idioma;
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
	
	private $estado;
	private $ciudad_nombre;
	private $estado_nombre;
	private $pais_nombre;
	private $cargo_descripcion_es;
	private $cargo_descripcion_en;
	private $tipo_persona_descripcion_es;
	private $tipo_persona_descripcion_en;
	
	private $empresa_nombre;
	private $sucursal_nombre;
	private $emp_emp_id;
	
	function __construct() {}

	/**
	 * @return the $con_id
	 */
	public function getCon_id() {
		return $this->con_id;
	}

	/**
	 * @return the $car_id
	 */
	public function getCar_id() {
		return $this->car_id;
	}

	/**
	 * @return the $tip_per_id
	 */
	public function getTip_per_id() {
		return $this->tip_per_id;
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
	 * @return the $con_observaciones
	 */
	public function getCon_observaciones() {
		return $this->con_observaciones;
	}

	/**
	 * @return the $con_idioma
	 */
	public function getCon_idioma() {
		return $this->con_idioma;
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
	 * @return the $cargo_descripcion_es
	 */
	public function getCargo_descripcion_es() {
		return $this->cargo_descripcion_es;
	}

	/**
	 * @return the $cargo_descripcion_en
	 */
	public function getCargo_descripcion_en() {
		return $this->cargo_descripcion_en;
	}

	/**
	 * @return the $tipo_persona_descripcion_es
	 */
	public function getTipo_persona_descripcion_es() {
		return $this->tipo_persona_descripcion_es;
	}

	/**
	 * @return the $tipo_persona_descripcion_en
	 */
	public function getTipo_persona_descripcion_en() {
		return $this->tipo_persona_descripcion_en;
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
	 * @param Ambigous <number, unknown> $con_id
	 */
	public function setCon_id($con_id) {
		$this->con_id = $con_id;
	}

	/**
	 * @param Ambigous <number, unknown> $car_id
	 */
	public function setCar_id($car_id) {
		$this->car_id = $car_id;
	}

	/**
	 * @param Ambigous <number, unknown> $tip_per_id
	 */
	public function setTip_per_id($tip_per_id) {
		$this->tip_per_id = $tip_per_id;
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
	 * @param Ambigous <NULL, unknown> $con_observaciones
	 */
	public function setCon_observaciones($con_observaciones) {
		$this->con_observaciones = $con_observaciones;
	}

	/**
	 * @param Ambigous <NULL, unknown> $con_idioma
	 */
	public function setCon_idioma($con_idioma) {
		$this->con_idioma = $con_idioma;
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
	 * @param Ambigous <NULL, unknown> $cargo_descripcion_es
	 */
	public function setCargo_descripcion_es($cargo_descripcion_es) {
		$this->cargo_descripcion_es = $cargo_descripcion_es;
	}

	/**
	 * @param Ambigous <NULL, unknown> $cargo_descripcion_en
	 */
	public function setCargo_descripcion_en($cargo_descripcion_en) {
		$this->cargo_descripcion_en = $cargo_descripcion_en;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tipo_persona_descripcion_es
	 */
	public function setTipo_persona_descripcion_es($tipo_persona_descripcion_es) {
		$this->tipo_persona_descripcion_es = $tipo_persona_descripcion_es;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tipo_persona_descripcion_en
	 */
	public function setTipo_persona_descripcion_en($tipo_persona_descripcion_en) {
		$this->tipo_persona_descripcion_en = $tipo_persona_descripcion_en;
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

	public function exchangeArray($data)
	{
		$this->con_id = (isset($data['CON_ID'])) ? $data['CON_ID'] : 0;
		$this->car_id = (isset($data['CAR_ID'])) ? $data['CAR_ID'] : 0;
		$this->tip_per_id = (isset($data['TIP_PER_ID'])) ? $data['TIP_PER_ID'] : 0;
		$this->ciu_id = (isset($data['CIU_ID'])) ? $data['CIU_ID'] : 0;
		$this->emp_id = (isset($data['EMP_ID'])) ? $data['EMP_ID'] : 0;
		$this->con_nombre = (isset($data['CON_NOMBRE'])) ? $data['CON_NOMBRE'] : null;
		$this->con_apellido = (isset($data['CON_APELLIDO'])) ? $data['CON_APELLIDO'] : null;
		$this->con_email = (isset($data['CON_EMAIL'])) ? $data['CON_EMAIL'] : null;
		$this->con_observaciones = (isset($data['CON_OBSERVACIONES'])) ? $data['CON_OBSERVACIONES'] : null;
		$this->con_idioma = (isset($data['CON_IDIOMA'])) ? $data['CON_IDIOMA'] : null;
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
		
		$this->cargo_descripcion_es = (isset($data['CAR_DESCRIPCION_ES'])) ? $data['CAR_DESCRIPCION_ES'] : null;
		$this->cargo_descripcion_en = (isset($data['CAR_DESCRIPCION_EN'])) ? $data['CAR_DESCRIPCION_EN'] : null;
		$this->ciudad_nombre = (isset($data['CIU_NOMBRE'])) ? $data['CIU_NOMBRE'] : null;
		$this->estado_nombre = (isset($data['EST_NOMBRE'])) ? $data['EST_NOMBRE'] : null;
		$this->pais_nombre = (isset($data['PAI_NOMBRE'])) ? $data['PAI_NOMBRE'] : null;
		
		$this->tipo_persona_descripcion_es = (isset($data['TIP_PER_DESCRIPCION_ES'])) ? $data['TIP_PER_DESCRIPCION_ES'] : null;
		$this->tipo_persona_descripcion_en = (isset($data['TIP_PER_DESCRIPCION_EN'])) ? $data['TIP_PER_DESCRIPCION_EN'] : null;
		
		$this->empresa_nombre = (isset($data['EMP_NOMBRE'])) ? $data['EMP_NOMBRE'] : null;
		$this->sucursal_nombre = (isset($data['SUC_NOMBRE'])) ? $data['SUC_NOMBRE'] : null;
		$this->emp_emp_id = (isset($data['EMP_EMP_ID'])) ? $data['EMP_EMP_ID'] : null;
		
		
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
