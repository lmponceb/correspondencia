<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cartas\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cartas\Form\Recepcion;
use Cartas\Model\Entity\FeRecepcion as RecepcionEntity;
use DOMPDFModule\View\Model\PdfModel;
use Cartas\Form\RecepcionValidator;

date_default_timezone_set('America/Guayaquil');

class RecepcionController extends AbstractActionController
{
	protected $feRecepcionDao;
	protected $empresaInternaDao;
	/* protected $cartaDao;
	protected $tipoCartaDao;
	protected $empresaInternaDao;
	protected $empresaDao;
	protected $empleadoDao;
	protected $proyectoDao;
	protected $contactoDao;
	protected $obraDao;
	protected $cartaDestinatarioDao;
	protected $cartaFirmaDao; */
	
    public function listadoAction()
    {
    	
        $recepcion = $this->getFeRecepcionDao ()->traerTodos ();
		
		return new ViewModel ( array (
				'recepcion' => $recepcion,
		) );
    }
   
    public function ingresarAction(){

   		$form = $this->getForm ();
    	
    	//FORMULARIO DE INGRESO DE INFORMACION
    	return new ViewModel ( array (
    			'formulario' => $form ,
    			'action' => $this->params()->fromRoute('action')
    	) );
    }
    
    public function editarAction(){
    	 
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );

    	$form = $this->getForm ();
    	
    	//FORMULARIO DE ACTUALIZACION DE INFORMACION
    	$recepcion = $this->getFeRecepcionDao()->traer ( $id );
    	
    	$form->bind ( $recepcion );
    		
    	$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
    	$form->get ( 'FE_REC_ID' )->setAttribute ( 'value', $recepcion->getFe_rec_id() );

    	$view = new ViewModel ( array (
    			'formulario' => $form ,
    			//'tipo_usuario' => $this->tipo_usuario,
    			//'privado' => $this->privado,
    			//'id' => $id,
    			'action' => $this->params()->fromRoute('action')
    	) );
    	
    	$view->setTemplate('cartas/recepcion/ingresar');
    	return $view;
    	
    }
    
    
    public function validarAction(){
    	
		//VERIFICA QUE SE HAYA REALIZADO UN POST DE INFORMACION
		if (! $this->request->isPost ()) {
			return $this->redirect ()->toRoute ( 'cartas', array (
					'controller' => 'recepcion',
					'action' => 'listado' 
			) );
		}
		
		//CAPTURA LA INFORMACION ENVIADA EN EL POST
		$data = $this->request->getPost ();
		
		$form = $this->getForm();
		
		//SE VALIDA EL FORMULARIO
		//$form->setInputFilter ( new RecepcionValidator() );
		
		//SE LLENAN LOS DATOS DEL FORMULARIO
		$form->setData ( $data );
		
		//SE VALIDA EL FORMULARIO ES CORRECTO
		if (! $form->isValid ()) {
			
			// SI EL FORMULARIO NO ES CORRECTO
			$modelView = new ViewModel ( array (
				'formulario' => $form ,
    			'action' => $this->params()->fromRoute('action')
			) );
			
			$modelView->setTemplate ( 'cartas/recepcion/ingresar' );
			return $modelView;
		}
		
		//->AQUI EL FORMULARIO ES CORRECTO, SE VALIDO CORRECTAMENTE
		
		//SE GENERA EL OBJETO DE CONTACTO
		$recepcion = new RecepcionEntity();
		//SE CARGA LA ENTIDAD CON LA INFORMACION DEL POST
		$recepcion->exchangeArray ( $data );
		
		//SE GRABA LA INFORMACION EN LA BDD
		$this->getFeRecepcionDao() ->guardar ( $recepcion );
		
        //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
		return $this->redirect ()->toRoute ( 'cartas', array (
				'controller' => 'recepcion',
				'action' => 'listado' 
		) );
    }
    
    public function procesarAction(){
    	
    	date_default_timezone_set('America/Guayaquil');
    	$anio = date('Y');
    	
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$ei = $this->getFeRecepcionDao()->traerEmpresaInterna($id);
    	
    	foreach ($ei as $emp){
    		$empresa_interna = $emp->getEmp_int_abreviacion();
    	}
    	
    	
    	$this->getFeRecepcionDao()->procesar($id, $anio, $empresa_interna);
    	$this->redirect()->toRoute('cartas', array('controller' => 'recepcion', 'action' => 'listado'));
    	
    }
    
    
    public function duplicarAction(){
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$fe_recepcion = $this->getFeRecepcionDao()->traer($id);

    	/* $carta_firma = $this->getCartaFirmaDao()->traerTodosPorCarta($fe_recepcion->getCtr_id());
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($fe_recepcion->getCtr_id()); */
    	
    	$this->getFeRecepcionDao() ->duplicar ( $fe_recepcion );
    	
    	/* $arreglo = array();
    	foreach($ctr_id as $codigo){
    		$arreglo[] = $codigo;
    	}
    		
    	$codigo_carta = $arreglo[0]['CURRVAL']; */
    	
    	/* $this->getCartaDestinatarioDao() ->duplicar ( $carta_destinatario, $codigo_carta );
    	
    	foreach ($carta_firma as $fir){
    		$this->getCartaFirmaDao() ->duplicar ( $fir, $codigo_carta );
    	} */
    	
    	
    	$this->redirect()->toRoute('cartas', array('controller' => 'recepcion', 'action' => 'listado'));
    	
    }
    
    public function pdfAction(){
    	
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	 
    	$fe_recepcion = $this->getFeRecepcionDao()->traer($id);
    	//$carta_destinatario = $this->getCartaDestinatarioDao()->traer($id);
    	 
    	//$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	 
    	/* $empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	 
    	$emp_emp_id = $empresa->getEmp_emp_id();
    	 
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    	}else{
    		$empresa_padre = $empresa;
    	} */
    	 
    	//$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	 
    	$pdf = new PdfModel();
    	$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
    	$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
    	$pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"
    	 
    	$pdf->setVariables(array(
    			'fe_recepcion' => $fe_recepcion,
    			//'contacto' => $contacto,
    			//'carta_firma' => $carta_firma,
    			//'empresa' => $empresa_padre
    	));
    	
    	return $pdf;
    }
  
    public function getForm() {
    	
    	$form = new Recepcion();
//     	$form->get ( 'TIP_CAR_ID' )->setValueOptions ( $this->getTipoCartaDao ()->traerTodosArreglo () );
     	$form->get ( 'EMP_INT_ID' )->setValueOptions ( $this->getEmpresaInternaDao ()->traerTodosArregloAbreviado () );
//     	$form->get ( 'EMP_ID' )->setValueOptions ( $this->getEmpresaDao ()->traerEmpresas () );
//     	$form->get ( 'EPL_ID_UNO' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
//     	$form->get ( 'EPL_ID_DOS' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
//     	$form->get ( 'PRO_ID' )->setValueOptions ( $this->getProyectoDao ()->traerTodosArreglo () );
    	return $form;
    }
    
    public function getFeRecepcionDao() {
    	if (! $this->feRecepcionDao) {
    		$sm = $this->getServiceLocator ();
    		$this->feRecepcionDao = $sm->get ( 'Cartas\Model\Dao\FeRecepcionDao' );
    	}
    	return $this->feRecepcionDao;
    } 
    
    /* 
    public function getCartaDao() {
    	if (! $this->cartaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->cartaDao = $sm->get ( 'Cartas\Model\Dao\CartaDao' );
    	}
    	return $this->cartaDao;
    }
    
    public function getCartaFirmaDao() {
    	if (! $this->cartaFirmaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->cartaFirmaDao = $sm->get ( 'Cartas\Model\Dao\CartaFirmaDao' );
    	}
    	return $this->cartaFirmaDao;
    }
    
    public function getCartaDestinatarioDao() {
    	if (! $this->cartaDestinatarioDao) {
    		$sm = $this->getServiceLocator ();
    		$this->cartaDestinatarioDao = $sm->get ( 'Cartas\Model\Dao\CartaDestinatarioDao' );
    	}
    	return $this->cartaDestinatarioDao;
    }
    
    public function getTipoCartaDao() {
    	if (! $this->tipoCartaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->tipoCartaDao = $sm->get ( 'Cartas\Model\Dao\TipoCartaDao' );
    	}
    	return $this->tipoCartaDao;
    }
*/
    public function getEmpresaInternaDao() {
    	if (! $this->empresaInternaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->empresaInternaDao = $sm->get ( 'Cartas\Model\Dao\EmpresaInternaDao' );
    	}
    	return $this->empresaInternaDao;
    }
/*
    public function getEmpresaDao() {
    	if (! $this->empresaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->empresaDao = $sm->get ( 'Cartas\Model\Dao\EmpresaDao' );
    	}
    	return $this->empresaDao;
    }
    
    public function getEmpleadoDao() {
    	if (! $this->empleadoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->empleadoDao = $sm->get ( 'Cartas\Model\Dao\EmpleadoDao' );
    	}
    	return $this->empleadoDao;
    }

    public function getProyectoDao() {
    	if (! $this->proyectoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->proyectoDao = $sm->get ( 'Cartas\Model\Dao\ProyectoDao' );
    	}
    	return $this->proyectoDao;
    }
    
    public function getContactoDao() {
    	if (! $this->contactoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->contactoDao = $sm->get ( 'Cartas\Model\Dao\ContactoDao' );
    	}
    	return $this->contactoDao;
    } */
    
    /* public function getObraDao() {
    	if (! $this->obraDao) {
    		$sm = $this->getServiceLocator ();
    		$this->obraDao = $sm->get ( 'Cartas\Model\Dao\ObraDao' );
    	}
    	return $this->obraDao;
    } */
    /* 
    public function contactosAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$sucursal = $this->request->getPost('sucursal');
    		$data = $this->getContactoDao()->getContactosPorSucursal($sucursal);
    
    		$jsonData = json_encode($data);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
    public function contactosempresaAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$empresa = $this->request->getPost('empresa');
    		$data = $this->getContactoDao()->getContactosPorEmpresa($empresa);
    
    		$jsonData = json_encode($data);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
    public function cargoAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$emp_id = $this->request->getPost('empleado');
    		$data = $this->getEmpleadoDao() ->traer($emp_id);
    		
    		$valores = array();
    		$valores['epl_cargo'] = $data->getEpl_cargo();
    
    		$jsonData = json_encode($valores);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    } */
    
    /* public function obraAction(){
  	  if($this->getRequest()->isXmlHttpRequest()){
    		$pro_id = $this->request->getPost('proyecto');
    		$data = $this->getObraDao()->getObrasPorProyecto($pro_id);
    
    		$jsonData = json_encode($data);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    } */
    
}