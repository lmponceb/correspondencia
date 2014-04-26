<?php
namespace Contactos\Model\Entity;

class Contacto {
	
	private $con_id;
	private $car_id;
	private $suc_id;
	private $tip_per_id;
	private $ciu_id;
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
	 * @return the $suc_id
	 */
	public function getSuc_id() {
		return $this->suc_id;
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
	 * @param Ambigous <NULL, unknown> $con_id
	 */
	public function setCon_id($con_id) {
		$this->con_id = $con_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $car_id
	 */
	public function setCar_id($car_id) {
		$this->car_id = $car_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $suc_id
	 */
	public function setSuc_id($suc_id) {
		$this->suc_id = $suc_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $tip_per_id
	 */
	public function setTip_per_id($tip_per_id) {
		$this->tip_per_id = $tip_per_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $ciu_id
	 */
	public function setCiu_id($ciu_id) {
		$this->ciu_id = $ciu_id;
	}

	/**
	 * @param field_type $con_nombre
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

	public function exchangeArray($data)
	{
		$this->con_id = (isset($data['CON_ID'])) ? $data['CON_ID'] : null;
		$this->car_id = (isset($data['CAR_ID'])) ? $data['CAR_ID'] : null;
		$this->suc_id = (isset($data['SUC_ID'])) ? $data['SUC_ID'] : null;
		$this->tip_per_id = (isset($data['TIP_PER_ID'])) ? $data['TIP_PER_ID'] : null;
		$this->ciu_id = (isset($data['CIU_ID'])) ? $data['CIU_ID'] : null;
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
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
