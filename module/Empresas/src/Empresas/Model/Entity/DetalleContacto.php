<?php
namespace Empresas\Model\Entity;

class DetalleContacto {
	

	private $det_con_id;
	private $emp_id;
	private $con_id;
	private $suc_id;
	private $tip_tel_id;
	private $det_con_codigo_pais;
	private $det_con_codigo_ciudad;
	private $det_con_valor;
	private $det_con_extension;

	
	function __construct() {}
	
	public function getDet_con_id(){return $this->det_con_id;}
	public function getEmp_id(){return $this->emp_id;}
	public function getCon_id(){return $this->con_id;}
	public function getSuc_id(){return $this->suc_id;}
	public function getTip_tel_id(){return $this->tip_tel_id;}
	public function getDet_con_codigo_pais(){return $this->det_con_codigo_pais;}
	public function getDet_con_codigo_ciudad(){return $this->det_con_codigo_ciudad;}
	public function getDet_con_valor(){return $this->det_con_valor;}
	public function getDet_con_extension(){return $this->det_con_extension;}

	public function setDet_con_id($det_con_id){$this->det_con_id=$det_con_id;}
	public function setEmp_id($emp_id){$this->emp_id=$emp_id;}
	public function setCon_id($con_id){$this->con_id=$con_id;}
	public function setSuc_id($suc_id){$this->suc_id=$suc_id;}
	public function setTip_tel_id($tip_tel_id){$this->tip_tel_id=$tip_tel_id;}
	public function setDet_con_codigo_pais($det_con_codigo_pais){$this->det_con_codigo_pais=$det_con_codigo_pais;}
	public function setDet_con_codigo_ciudad($det_con_codigo_ciudad){$this->det_con_codigo_ciudad=$det_con_codigo_ciudad;}
	public function setDet_con_valor($det_con_valor){$this->det_con_valor=$det_con_valor;}
	public function setDet_con_extension($det_con_extension){$this->det_con_extension=$det_con_extension;}
	
	public function exchangeArray($data)
	{
		$this->det_con_id=(isset($data['DET_CON_ID'])) ? $data['DET_CON_ID'] : null;
		$this->emp_id=(isset($data['EMP_ID'])) ? $data['EMP_ID'] : null;
		$this->con_id=(isset($data['CON_ID'])) ? $data['CON_ID'] : null;
		$this->suc_id=(isset($data['SUC_ID'])) ? $data['SUC_ID'] : null;
		$this->tip_tel_id=(isset($data['TIP_TEL_ID'])) ? $data['TIP_TEL_ID'] : null;
		$this->det_con_codigo_pais=(isset($data['DET_CON_CODIGO_PAIS'])) ? $data['DET_CON_CODIGO_PAIS'] : null;
		$this->det_con_codigo_ciudad=(isset($data['DET_CON_CODIGO_CIUDAD'])) ? $data['DET_CON_CODIGO_CIUDAD'] : null;
		$this->det_con_valor=(isset($data['DET_CON_VALOR'])) ? $data['DET_CON_VALOR'] : null;
		$this->det_con_extension=(isset($data['DET_CON_EXTENSION'])) ? $data['DET_CON_EXTENSION'] : null;
	}
	
}
