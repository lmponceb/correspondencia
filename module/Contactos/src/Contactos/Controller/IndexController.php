<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Contactos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Contactos\Form\Contacto;
use Contactos\Model\Entity\Contacto as ContactoEntity;
use Contactos\Form\ContactoValidator;
use Contactos\Model\Entity\DetalleContacto;
use Contactos\Model\Entity\ContactoRelacionado;
use DOMPDFModule\View\Model\PdfModel;

date_default_timezone_set('America/Guayaquil');

class IndexController extends AbstractActionController {
	
	protected $contactoDao;
	protected $tipoPersonaDao;
	protected $empresaDao;
	protected $cargoDao;
	protected $paisDao;
	protected $sucursalDao;
	protected $ciudadDao;
	protected $estadoDao;
	protected $detalleContactoDao;
	protected $contactoRelacionado;
	private $privado = 'S';
	private $tipo_usuario;
	private $tipoContactoDao;
	protected $tipoTelefonoDao;
	
	public function __construct(){
		$this->tipo_usuario = $_SESSION['Zend_Auth']['storage']->us_role;
	}
	
	public function indexAction() {
		return $this->redirect ()->toRoute ( 'contactos', array (
					'controller' => 'index',
					'action' => 'ingresar' 
			) );
		
	}
	
	public function listadoAction() {
		$contactos  =$this->getContactoDao ()->traerTodos ();
		
		return new ViewModel ( array (
				'contactos' => $contactos,
				'tipo_usuario' => $this->tipo_usuario
				
		) );
	}
	
	public function ingresarAction() {
		
		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
		$form = $this->getForm ();
		
		//FORMULARIO DE INGRESO DE INFORMACION
		return new ViewModel ( array (
			'formulario' => $form ,
			'tipo_usuario' => $this->tipo_usuario,
			'privado' => $this->privado,
			//'lang' => $lang,
			'id' => $id,
			'action' => $this->params()->fromRoute('action')	
		) );
		
	}

	public function editarAction(){

		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );

		$form = $this->getForm ();
		
			//FORMULARIO DE ACTUALIZACION DE INFORMACION
			$contacto = $this->getContactoDao ()->traer ( $id );
			
			$form->bind ( $contacto );
			
			//TRAER LOS CONTACTOS RELACIONADOS
			$contacto_relacionado = $this->getContactoRelacionadoDao()->traerPorContacto($id);
			
			$i=0;
			foreach ($contacto_relacionado as $con_rel_info){
				$form->get('CONTACTO_RELACIONADO['.$i.'][TIP_CON_ID]')->setValue($con_rel_info->getTip_con_id());
				$form->get('CONTACTO_RELACIONADO['.$i.'][CON_REL_VALOR]')->setValue($con_rel_info->getCon_rel_valor());
				$i++;
			}
			
			//TRAER LOS DETALLES DE CONTACTO 
			$detalle_contacto = $this->getDetalleContactoDao()->traerPorContacto($id);
			
			$j = 0;
			foreach ($detalle_contacto as $det_con_info){
				$form->get('DETALLE_CONTACTO['.$j.'][oculto]')->setValue($det_con_info->getDet_con_codigo_ciudad());
				$form->get('DETALLE_CONTACTO['.$j.'][TIP_TEL_ID]')->setValue($det_con_info->getTip_tel_id());
				$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_CODIGO_PAIS]')->setValue($det_con_info->getDet_con_codigo_pais());
				$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_CODIGO_CIUDAD]')->setValue($det_con_info->getDet_con_codigo_ciudad());
				$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_VALOR]')->setValue($det_con_info->getDet_con_valor());
				$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_EXTENSION]')->setValue($det_con_info->getDet_con_extension());
				$j++;
			}
			
			$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
			$form->get ( 'CON_ID' )->setAttribute ( 'value', $contacto->getCon_id() );
			
			$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
			$codigo_empresa = $empresa->getEmp_id();
			$codigo_padre = $empresa->getEmp_emp_id();
			
			//SE VALIDA SI ES EMPRESA
			if(!isset($codigo_padre) || is_null($codigo_padre)){
				//ES EL CONTACTO DE EMPRESA
				$form->get ( 'EMP_ID' )->setAttribute ( 'value', $codigo_empresa );
				$form->get ( 'sucursal_oculto' )->setAttribute ( 'value', '' );
			}else{
				
				//ES EL CONTACTO DE SUCURSAL
				$padre = $this->getEmpresaDao()->traer($codigo_padre);
				$form->get ( 'EMP_ID' )->setAttribute ( 'value', $codigo_padre );
				$form->get ( 'SUC_ID' )->setAttribute ( 'value', $codigo_empresa);
				$form->get ( 'sucursal_oculto' )->setAttribute ( 'value', $codigo_empresa);
			} 
			
			$ciudad = $this->getCiudadDao()->traer($contacto->getCiu_id());
			$estado = $this->getEstadoDao()->traer($ciudad->getEst_id());
				
			$form->get ( 'estado_oculto' )->setAttribute ( 'value', $ciudad->getEst_id() );
			$form->get ( 'PAI_ID' )->setAttribute ( 'value', $estado->getPai_id() );
			$form->get ( 'ciudad_oculto' )->setAttribute ( 'value', $contacto->getCiu_id() );
				
			if(strtoupper($this->tipo_usuario) != 1 && strtoupper($this->tipo_usuario) != 2){
		
				if(strtoupper($contacto->getCon_privado()) == 'N'){
					$form->get ( 'CON_EMAIL_PERSONAL' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_FECHA_NACIMIENTO_PERSONAL' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_TELEFONO_DOMICILIO_PER' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_CELULAR_PERSONAL' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_DIRECCION_DOMICILIO_PER' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_OBSERVACIONES_PRIVADO' )->setAttribute ( 'readonly', 'readonly' );
					
					for ($i=0; $i<5; $i++){
						$form->get ( 'CONTACTO_RELACIONADO['.$i.'][TIP_CON_ID]' )->setAttribute ( 'disabled', 'disabled' );
						$form->get ( 'CONTACTO_RELACIONADO['.$i.'][CON_REL_VALOR]' )->setAttribute ( 'readonly', 'readonly' );
					}
					
					$this->privado = 'N';
				}
		
				if(strtoupper($contacto->getCon_privado()) == 'S'){
					$this->privado = 'S';
				}
			}
			
		$view = new ViewModel ( array (
				'formulario' => $form ,
				'tipo_usuario' => $this->tipo_usuario,
				'privado' => $this->privado,
				'id' => $id,
				'action' => $this->params()->fromRoute('action')
		) );
		
		$view->setTemplate('contactos/index/ingresar');
		return $view;
	}
	
	public function eliminarAction(){
		
		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
		
		//FORMULARIO DE ACTUALIZACION DE INFORMACION
		$this->getContactoDao ()->cambiarEstado ( $id, 'I' );
		return $this->redirect ()->toRoute ( 'contactos', array (
				'controller' => 'index',
				'action' => 'listado'
		) );
	}
	
	public function activarAction(){
	
		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
	
		//FORMULARIO DE ACTUALIZACION DE INFORMACION
		$this->getContactoDao ()->cambiarEstado ( $id, 'A' );
		return $this->redirect ()->toRoute ( 'contactos', array (
				'controller' => 'index',
				'action' => 'listado'
		) );
	}
	
	public function validarAction() {
		
		//VERIFICA QUE SE HAYA REALIZADO UN POST DE INFORMACION
		if (! $this->request->isPost ()) {
			return $this->redirect ()->toRoute ( 'contactos', array (
					'controller' => 'index',
					'action' => 'listado' 
			) );
		}
		
		//CAPTURA LA INFORMACION ENVIADA EN EL POST
		$data = $this->request->getPost ();
		
		//LLENA LOS CAMPOS OCULTOS PARA GENERAR LA FUNCION READY DE JQUERY
		$data['estado_oculto'] = $data['EST_ID'];
		$data['sucursal_oculto'] = $data['SUC_ID'];
		$data['ciudad_oculto'] = $data['CIU_ID'];
		
		//VERIFICA EL IDIOMA INGRESADO PARA TRAER EL FORMULARIO SEGUN EL IDIOMA 
		$form = $this->getForm();
		
		//SE VALIDA EL FORMULARIO
		$form->setInputFilter ( new ContactoValidator () );
		
		//SE LLENAN LOS DATOS DEL FORMULARIO
		$form->setData ( $data );
		
		for ($i=0; $i<count($data['CONTACTO_RELACIONADO']); $i++){
			if(isset($data['CONTACTO_RELACIONADO'][$i]['TIP_CON_ID']))
				$form->get('CONTACTO_RELACIONADO['.$i.'][TIP_CON_ID]')->setValue($data['CONTACTO_RELACIONADO'][$i]['TIP_CON_ID']);
			$form->get('CONTACTO_RELACIONADO['.$i.'][CON_REL_VALOR]')->setValue($data['CONTACTO_RELACIONADO'][$i]['CON_REL_VALOR']);
		}
		
		for ($j=0; $j<count($data['DETALLE_CONTACTO']); $j++){
			$form->get('DETALLE_CONTACTO['.$j.'][oculto]')->setValue($data['DETALLE_CONTACTO'][$j]['DET_CON_CODIGO_CIUDAD']);
			$form->get('DETALLE_CONTACTO['.$j.'][TIP_TEL_ID]')->setValue($data['DETALLE_CONTACTO'][$j]['TIP_TEL_ID']);
			$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_CODIGO_PAIS]')->setValue($data['DETALLE_CONTACTO'][$j]['DET_CON_CODIGO_PAIS']);
			$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_CODIGO_CIUDAD]')->setValue($data['DETALLE_CONTACTO'][$j]['DET_CON_CODIGO_CIUDAD']);
			$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_VALOR]')->setValue($data['DETALLE_CONTACTO'][$j]['DET_CON_VALOR']);
			$form->get('DETALLE_CONTACTO['.$j.'][DET_CON_EXTENSION]')->setValue($data['DETALLE_CONTACTO'][$j]['DET_CON_EXTENSION']);
		}
		
		//SE VALIDA EL FORMULARIO ES CORRECTO
		if (! $form->isValid ()) {
			// SI EL FORMULARIO NO ES CORRECTO
			$modelView = new ViewModel ( array (
					'formulario' => $form ,
					'tipo_usuario' => $this->tipo_usuario,
					'privado' => $this->privado
			) );
			
			$modelView->setTemplate ( 'contactos/index/ingresar' );
			return $modelView;
		}
		//->AQUI EL FORMULARIO ES CORRECTO, SE VALIDO CORRECTAMENTE
		
		//SI SE SELECCIONO UNA SUCURSAL, ESTA SERA LA EMPRESA DEL CONTACTO
		if(!empty($data['SUC_ID']) && !is_null($data['SUC_ID'])){
			//SI EL CONTACTO ESTA EN UNA SUCURSAL SE AGREGA AL CAMPO DE EMPRESA
			$data['EMP_ID'] = $data['SUC_ID'];
		}
		
		//SE GENERA EL OBJETO DE CONTACTO
		$contacto = new ContactoEntity();
		//SE CARGA LA ENTIDAD CON LA INFORMACION DEL POST
		$contacto->exchangeArray ( $data );
		
		//SE GRABA LA INFORMACION EN LA BDD
		$codigo_contacto = $this->getContactoDao() ->guardar ( $contacto );
		
		//SI SE ACTUALIZA EL CONTACTO, SE BORRAN LOS DATOS ASOCIADOS
		if(!empty($data['CON_ID']) && !is_null($data['CON_ID'])){
			
			$this->getDetalleContactoDao()->eliminarPorContacto($data['CON_ID']);
			
			//SI EL USURIO ES DIFERENTE DE OPERADOR, PUEDE ELIMINAR LA INFORMACION
			if(strtoupper($this->tipo_usuario) == 1 || strtoupper($this->tipo_usuario) == 2){
				$this->getContactoRelacionadoDao()->eliminarPorContacto($data['CON_ID']);
			}
			
			$codigo_contacto = $data['CON_ID'];
		}else{
			$arreglo = array();
			foreach($codigo_contacto as $codigo){
				$arreglo[] = $codigo;
			}
			
			$codigo_contacto = $arreglo[0]['CURRVAL'];
		}
		
		$detalleContactoParamsArray = $data['DETALLE_CONTACTO'];
		$contactoRelacionadoParamsArray = $data['CONTACTO_RELACIONADO'];
		
		//SE GRABAN LOS DATOS ASOCIADOS
		// SOLO SI ES ADMINISTRADOR O USUARIO GERENCIAL PUEDE INGRESAR LA INFORMACION DE CONTACTO RELACIONADO
		if(strtoupper($this->tipo_usuario) == 1 || strtoupper($this->tipo_usuario) == 2){
			
			foreach($contactoRelacionadoParamsArray as $contactoRelacionadoParams){
	        	if(
	        	!empty($contactoRelacionadoParams['TIP_CON_ID']) && !is_null($contactoRelacionadoParams['TIP_CON_ID']) &&
	        	!empty($contactoRelacionadoParams['CON_REL_VALOR']) && !is_null($contactoRelacionadoParams['CON_REL_VALOR']) 
	        	){
	        		//SE GRABAN LOS CONTACTOS RELACIONADOS EN LA BDD
	        		$contactoRelaciondo = new ContactoRelacionado();
	        		$contactoRelacionadoParams['CON_ID'] = $codigo_contacto;
	        		$contactoRelaciondo->exchangeArray($contactoRelacionadoParams);
	        		$this->getContactoRelacionadoDao()->guardar($contactoRelaciondo);
	        	}
	        }
		}
		
		//SE GRABAN LOS DETALLES DE CONTACTO ADICIONALES
        foreach($detalleContactoParamsArray as $detalleContactoParams){
        	if(
        		!empty($detalleContactoParams['TIP_TEL_ID']) && !is_null($detalleContactoParams['TIP_TEL_ID']) &&
        		!empty($detalleContactoParams['DET_CON_CODIGO_PAIS']) && !is_null($detalleContactoParams['DET_CON_CODIGO_PAIS']) &&
        		!empty($detalleContactoParams['DET_CON_CODIGO_CIUDAD']) && !is_null($detalleContactoParams['DET_CON_CODIGO_CIUDAD']) &&
        		!empty($detalleContactoParams['DET_CON_VALOR']) && !is_null($detalleContactoParams['DET_CON_VALOR'])
			)
        	
        	{
				//SE GUARDA EN LA BASE DE DATOS
        		$detalleContacto = new DetalleContacto();
        		$detalleContactoParams['CON_ID'] = $codigo_contacto;
        		$detalleContacto->exchangeArray($detalleContactoParams);
        		$this->getDetalleContactoDao()->guardar($detalleContacto);
        	}
        } 
        
        //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
		return $this->redirect ()->toRoute ( 'contactos', array (
				'controller' => 'index',
				'action' => 'listado' 
		) );
	}
	
	public function courierAction(){
		 
		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
		
		$contacto = $this->getContactoDao()->traer($id);
		 
		$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
		 
		$emp_emp_id = $empresa->getEmp_emp_id();
		 
		if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
			$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
		}else{
			$empresa_padre = $empresa;
		}
		
		$detalle_empresa = $this->getDetalleContactoDao()->getDetallePorEmpresaUnico($empresa_padre->getEmp_id());
		
		$pdf = new PdfModel();
		$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
		$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
		$pdf->setOption('paperOrientation', 'landscape'); // Defaults to "portrait"
		 
		$pdf->setVariables(array(
				'contacto' => $contacto,
				'empresa' => $empresa_padre,
				'detalle' => $detalle_empresa
		));
	
		return $pdf;
		 
	}
	
	public function sobreAction(){
			
		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
	
		$contacto = $this->getContactoDao()->traer($id);
			
		$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
			
		$emp_emp_id = $empresa->getEmp_emp_id();
			
		if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
			$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
		}else{
			$empresa_padre = $empresa;
		}
	
		$detalle_empresa = $this->getDetalleContactoDao()->getDetallePorContactoUnico($contacto->getCon_id());
	
		$pdf = new PdfModel();
		$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
		$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
		$pdf->setOption('paperOrientation', 'landscape'); // Defaults to "portrait"
			
		$pdf->setVariables(array(
				'contacto' => $contacto,
				'empresa' => $empresa_padre,
				'detalle' => $detalle_empresa
		));
	
		return $pdf;
			
	}
	
	public function getForm() {
		$form = new Contacto ();
		
		$indice_detalle_contacto=0;
		$indice_contacto_relacionado = 0;
		
		$form->get ( 'EMP_ID' )->setValueOptions ( $this->getEmpresaDao ()->traerEmpresas () );
		$form->get ( 'PAI_ID' )->setValueOptions ( $this->getPaisDao ()->traerTodosArreglo () );
		for ($indice_detalle_contacto=0; $indice_detalle_contacto<5; $indice_detalle_contacto++){
			$form->get('DETALLE_CONTACTO['.$indice_detalle_contacto.'][TIP_TEL_ID]')->setValueOptions($this->getTipoTelefonoDao()->getTipoTelefonoSelect());
			$form->get('DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_PAIS]')->setValueOptions($this->getPaisDao()->getCodigoPaisesSelect());
			$form->get( 'CONTACTO_RELACIONADO[' . $indice_detalle_contacto . '][TIP_CON_ID]')->setValueOptions($this->getTipoContactoDao()->getTipoContactoSelect());
		}
		
		return $form;
	}
	
	public function sucursalesAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$empresa = $this->request->getPost('empresa');
			$data = $this->getEmpresaDao()->getSucursalesPorEmpresa($empresa);
			
			$jsonData = json_encode($data);
			$response = $this->getResponse();
			$response->setStatusCode(200);
			$response->setContent($jsonData);
			
			return $response;
		}else{
			return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
		}
	}
	
	public function estadosAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$pais = $this->request->getPost('pais');
			$data = $this->getEstadoDao()->getEstadosPorPais($pais);
	
			$jsonData = json_encode($data);
			$response = $this->getResponse();
			$response->setStatusCode(200);
			$response->setContent($jsonData);
	
			return $response;
		}else{
			return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
		}
	}
	
	public function ciudadesAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$estado = $this->request->getPost('estado');
			$data = $this->getCiudadDao()->getCiudadesPorEstado($estado);
				
			$jsonData = json_encode($data);
			$response = $this->getResponse();
			$response->setStatusCode(200);
			$response->setContent($jsonData);
				
			return $response;
		}else{
			return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
		}
	}
	
	public function codigoPaisAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$pais = $this->request->getPost('pais');
			$data = $this->getPaisDao()->getCodigoTelefonoPais($pais);
			$valores = array();
			$valores['pai_codigo_telefono'] = $data->getPai_codigo_telefono();

			$jsonData = json_encode($valores);
			$response = $this->getResponse();
			$response->setStatusCode(200); 
			$response->setContent($jsonData);
		
			return $response;
		}else{
			return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
		}
	}
	
	public function codigoCiudadAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$ciudad = $this->request->getPost('ciudad');
			$data = $this->getCiudadDao()->getCodigoTelefonoCiudad($ciudad);
			$valores = array();
			$valores['ciu_codigo_telefono'] = $data->getCiu_codigo_telefono();
	
			$jsonData = json_encode($valores);
			$response = $this->getResponse();
			$response->setStatusCode(200);
			$response->setContent($jsonData);
	
			return $response;
		}else{
			return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
		}
	}
	
	public function codigoCiudadTipoAction(){
	 if($this->getRequest()->isXmlHttpRequest()){
            $det_con_codigo_pais = $this->request->getPost('det_con_codigo_pais');
            $data = $this->getCiudadDao()->getCodigoCiudadPorCodigoPais($det_con_codigo_pais);
    
            $jsonData = json_encode($data);
            $response = $this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($jsonData);
    
            return $response;
        }else{
            return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
        }
	}
	
	public function datosEmpresaAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$empresa = $this->request->getPost('empresa');
			$data = $this->getEmpresaDao()->traer($empresa);
			$valores = array();
			$valores['emp_direccion'] = $data->getEmp_direccion();
			$valores['emp_email'] = $data->getEmp_email();
			$valores['emp_pagina_web'] = $data->getEmp_pagina_web();
	
			$jsonData = json_encode($valores);
			$response = $this->getResponse();
			$response->setStatusCode(200);
			$response->setContent($jsonData);
	
			return $response;
		}else{
			return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
		}
	}
	
	public function getContactoDao() {
		if (! $this->contactoDao) {
			$sm = $this->getServiceLocator ();
			$this->contactoDao = $sm->get ( 'Contactos\Model\Dao\ContactoDao' );
		}
		return $this->contactoDao;
	}
	
	public function getTipoPersonaDao() {
		if (! $this->tipoPersonaDao) {
			$sm = $this->getServiceLocator ();
			$this->tipoPersonaDao = $sm->get ( 'Contactos\Model\Dao\TipoPersonaDao' );
		}
		return $this->tipoPersonaDao;
	}
	
	public function getEmpresaDao() {
		if (! $this->empresaDao) {
			$sm = $this->getServiceLocator ();
			$this->empresaDao = $sm->get ( 'Contactos\Model\Dao\EmpresaDao' );
		}
		return $this->empresaDao;
	}
	
	public function getCargoDao() {
		if (! $this->cargoDao) {
			$sm = $this->getServiceLocator ();
			$this->cargoDao = $sm->get ( 'Contactos\Model\Dao\CargoDao' );
		}
		return $this->cargoDao;
	}

	public function getPaisDao() {
		if (! $this->paisDao) {
			$sm = $this->getServiceLocator ();
			$this->paisDao = $sm->get ( 'Contactos\Model\Dao\PaisDao' );
		}
		return $this->paisDao;
	} 
	
	public function getSucursalDao() {
		if (! $this->sucursalDao) {
			$sm = $this->getServiceLocator ();
			$this->sucursalDao = $sm->get ( 'Contactos\Model\Dao\SucursalDao' );
		}
		return $this->sucursalDao;
	}
	
	public function getCiudadDao() {
		if (! $this->ciudadDao) {
			$sm = $this->getServiceLocator ();
			$this->ciudadDao = $sm->get ( 'Contactos\Model\Dao\CiudadDao' );
		}
		return $this->ciudadDao;
	}
	
	public function getEstadoDao() {
		if (! $this->estadoDao) {
			$sm = $this->getServiceLocator ();
			$this->estadoDao = $sm->get ( 'Contactos\Model\Dao\EstadoDao' );
		}
		return $this->estadoDao;
	}
	
	public function getTipoTelefonoDao()
	{
		if (!$this->tipoTelefonoDao) {
			$sm = $this->getServiceLocator();
			$this->tipoTelefonoDao = $sm->get('Empresas\Model\Dao\TipoTelefonoDao');
		}
		return $this->tipoTelefonoDao;
	}
	
	public function getTipoContactoDao() {
		if (! $this->tipoContactoDao) {
			$sm = $this->getServiceLocator ();
			$this->tipoContactoDao = $sm->get ( 'Contactos\Model\Dao\TipoContactoDao' );
		}
		return $this->tipoContactoDao;
	}
	
	public function getDetalleContactoDao()
	{
		if (!$this->detalleContactoDao) {
			$sm = $this->getServiceLocator();
			$this->detalleContactoDao = $sm->get('Contactos\Model\Dao\DetalleContactoDao');
		}
		return $this->detalleContactoDao;
	}
	
	public function getContactoRelacionadoDao()
	{
		if (!$this->contactoRelacionado) {
			$sm = $this->getServiceLocator();
			$this->contactoRelacionado = $sm->get('Contactos\Model\Dao\ContactoRelacionadoDao');
		}
		return $this->contactoRelacionado;
	}

}
