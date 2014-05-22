<?php
namespace Cartas\Model\Entity;

class FeRecepcion {
	
	private $fe_rec_id;
	private $us_codigo;
	private $fe_rec_tipo;
	private $fe_rec_idioma;
	private $fe_rec_fecha;
	private $fe_rec_responsable;
	private $fe_rec_descripcion;
	private $fe_rec_compania;
	private $fe_rec_oferente;
	private $fe_rec_oferta_nombre;
	private $fe_rec_oferta_codigo;
	private $fe_rec_fecha_hora;
	private $fe_rec_fecha_minuto;
	private $fe_rec_fecha_anio;
	private $fe_rec_fecha_mes;
	private $fe_rec_fecha_dia;
	private $fe_rec_sobre;
	private $fe_rec_estado;
	private $emp_int_id;
	
	function __construct() {}

	/**
	 * @return the $fe_rec_id
	 */
	public function getFe_rec_id() {
		return $this->fe_rec_id;
	}

	/**
	 * @return the $us_codigo
	 */
	public function getUs_codigo() {
		return $this->us_codigo;
	}

	/**
	 * @return the $fe_rec_tipo
	 */
	public function getFe_rec_tipo() {
		return $this->fe_rec_tipo;
	}

	/**
	 * @return the $fe_rec_idioma
	 */
	public function getFe_rec_idioma() {
		return $this->fe_rec_idioma;
	}

	/**
	 * @return the $fe_rec_fecha
	 */
	public function getFe_rec_fecha() {
		return $this->fe_rec_fecha;
	}

	/**
	 * @return the $fe_rec_responsable
	 */
	public function getFe_rec_responsable() {
		return $this->fe_rec_responsable;
	}

	/**
	 * @return the $fe_rec_descripcion
	 */
	public function getFe_rec_descripcion() {
		return $this->fe_rec_descripcion;
	}

	/**
	 * @return the $fe_rec_compania
	 */
	public function getFe_rec_compania() {
		return $this->fe_rec_compania;
	}

	/**
	 * @return the $fe_rec_oferente
	 */
	public function getFe_rec_oferente() {
		return $this->fe_rec_oferente;
	}

	/**
	 * @return the $fe_rec_oferta_nombre
	 */
	public function getFe_rec_oferta_nombre() {
		return $this->fe_rec_oferta_nombre;
	}

	/**
	 * @return the $fe_rec_oferta_codigo
	 */
	public function getFe_rec_oferta_codigo() {
		return $this->fe_rec_oferta_codigo;
	}

	/**
	 * @return the $fe_rec_fecha_hora
	 */
	public function getFe_rec_fecha_hora() {
		return $this->fe_rec_fecha_hora;
	}

	/**
	 * @return the $fe_rec_fecha_minuto
	 */
	public function getFe_rec_fecha_minuto() {
		return $this->fe_rec_fecha_minuto;
	}

	/**
	 * @return the $fe_rec_fecha_anio
	 */
	public function getFe_rec_fecha_anio() {
		return $this->fe_rec_fecha_anio;
	}

	/**
	 * @return the $fe_rec_fecha_mes
	 */
	public function getFe_rec_fecha_mes() {
		return $this->fe_rec_fecha_mes;
	}

	/**
	 * @return the $fe_rec_fecha_dia
	 */
	public function getFe_rec_fecha_dia() {
		return $this->fe_rec_fecha_dia;
	}

	/**
	 * @return the $fe_rec_sobre
	 */
	public function getFe_rec_sobre() {
		return $this->fe_rec_sobre;
	}

	/**
	 * @return the $fe_rec_estado
	 */
	public function getFe_rec_estado() {
		return $this->fe_rec_estado;
	}

	/**
	 * @return the $emp_int_id
	 */
	public function getEmp_int_id() {
		return $this->emp_int_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_id
	 */
	public function setFe_rec_id($fe_rec_id) {
		$this->fe_rec_id = $fe_rec_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $us_codigo
	 */
	public function setUs_codigo($us_codigo) {
		$this->us_codigo = $us_codigo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_tipo
	 */
	public function setFe_rec_tipo($fe_rec_tipo) {
		$this->fe_rec_tipo = $fe_rec_tipo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_idioma
	 */
	public function setFe_rec_idioma($fe_rec_idioma) {
		$this->fe_rec_idioma = $fe_rec_idioma;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_fecha
	 */
	public function setFe_rec_fecha($fe_rec_fecha) {
		$this->fe_rec_fecha = $fe_rec_fecha;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_responsable
	 */
	public function setFe_rec_responsable($fe_rec_responsable) {
		$this->fe_rec_responsable = $fe_rec_responsable;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_descripcion
	 */
	public function setFe_rec_descripcion($fe_rec_descripcion) {
		$this->fe_rec_descripcion = $fe_rec_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_compania
	 */
	public function setFe_rec_compania($fe_rec_compania) {
		$this->fe_rec_compania = $fe_rec_compania;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_oferente
	 */
	public function setFe_rec_oferente($fe_rec_oferente) {
		$this->fe_rec_oferente = $fe_rec_oferente;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_oferta_nombre
	 */
	public function setFe_rec_oferta_nombre($fe_rec_oferta_nombre) {
		$this->fe_rec_oferta_nombre = $fe_rec_oferta_nombre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_oferta_codigo
	 */
	public function setFe_rec_oferta_codigo($fe_rec_oferta_codigo) {
		$this->fe_rec_oferta_codigo = $fe_rec_oferta_codigo;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_fecha_hora
	 */
	public function setFe_rec_fecha_hora($fe_rec_fecha_hora) {
		$this->fe_rec_fecha_hora = $fe_rec_fecha_hora;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_fecha_minuto
	 */
	public function setFe_rec_fecha_minuto($fe_rec_fecha_minuto) {
		$this->fe_rec_fecha_minuto = $fe_rec_fecha_minuto;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_fecha_anio
	 */
	public function setFe_rec_fecha_anio($fe_rec_fecha_anio) {
		$this->fe_rec_fecha_anio = $fe_rec_fecha_anio;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_fecha_mes
	 */
	public function setFe_rec_fecha_mes($fe_rec_fecha_mes) {
		$this->fe_rec_fecha_mes = $fe_rec_fecha_mes;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_fecha_dia
	 */
	public function setFe_rec_fecha_dia($fe_rec_fecha_dia) {
		$this->fe_rec_fecha_dia = $fe_rec_fecha_dia;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_sobre
	 */
	public function setFe_rec_sobre($fe_rec_sobre) {
		$this->fe_rec_sobre = $fe_rec_sobre;
	}

	/**
	 * @param Ambigous <NULL, unknown> $fe_rec_estado
	 */
	public function setFe_rec_estado($fe_rec_estado) {
		$this->fe_rec_estado = $fe_rec_estado;
	}

	/**
	 * @param Ambigous <NULL, unknown> $emp_int_id
	 */
	public function setEmp_int_id($emp_int_id) {
		$this->emp_int_id = $emp_int_id;
	}

	public function exchangeArray($data)
	{
		$this->fe_rec_id = (isset($data['FE_REC_ID'])) ? $data['FE_REC_ID'] : null;
		$this->us_codigo = (isset($data['US_CODIGO'])) ? $data['US_CODIGO'] : null;
		$this->fe_rec_tipo = (isset($data['FE_REC_TIPO'])) ? $data['FE_REC_TIPO'] : null;
		$this->fe_rec_idioma = (isset($data['FE_REC_IDIOMA'])) ? $data['FE_REC_IDIOMA'] : null;
		$this->fe_rec_fecha = (isset($data['FE_REC_FECHA'])) ? $data['FE_REC_FECHA'] : null;
		$this->fe_rec_responsable = (isset($data['FE_REC_RESPONSABLE'])) ? $data['FE_REC_RESPONSABLE'] : null;
		$this->fe_rec_descripcion = (isset($data['FE_REC_DESCRIPCION'])) ? $data['FE_REC_DESCRIPCION'] : null;
		$this->fe_rec_compania = (isset($data['FE_REC_COMPANIA'])) ? $data['FE_REC_COMPANIA'] : null;
		$this->fe_rec_oferente = (isset($data['FE_REC_OFERENTE'])) ? $data['FE_REC_OFERENTE'] : null;
		$this->fe_rec_oferta_nombre = (isset($data['FE_REC_OFERTA_NOMBRE'])) ? $data['FE_REC_OFERTA_NOMBRE'] : null;
		$this->fe_rec_oferta_codigo = (isset($data['FE_REC_OFERTA_CODIGO'])) ? $data['FE_REC_OFERTA_CODIGO'] : null;
		$this->fe_rec_fecha_hora = (isset($data['FE_REC_FECHA_HORA'])) ? $data['FE_REC_FECHA_HORA'] : null;
		$this->fe_rec_fecha_minuto = (isset($data['FE_REC_FECHA_MINUTO'])) ? $data['FE_REC_FECHA_MINUTO'] : null;
		$this->fe_rec_fecha_anio = (isset($data['FE_REC_FECHA_ANIO'])) ? $data['FE_REC_FECHA_ANIO'] : null;
		$this->fe_rec_fecha_mes = (isset($data['FE_REC_FECHA_MES'])) ? $data['FE_REC_FECHA_MES'] : null;
		$this->fe_rec_fecha_dia = (isset($data['FE_REC_FECHA_DIA'])) ? $data['FE_REC_FECHA_DIA'] : null;
		$this->fe_rec_sobre = (isset($data['FE_REC_SOBRE'])) ? $data['FE_REC_SOBRE'] : null;
		$this->fe_rec_estado = (isset($data['FE_REC_ESTADO'])) ? $data['FE_REC_ESTADO'] : null;
		$this->emp_int_id = (isset($data['EMP_INT_ID'])) ? $data['EMP_INT_ID'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}	
}
