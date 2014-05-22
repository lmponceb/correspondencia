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
use Recepcion\Form\Recepcion;
use Recepcion\Model\Entity\Recepcion as RecepcionEntity;
use DOMPDFModule\View\Model\PdfModel;
use Recepcion\Form\RecepcionValidator;

date_default_timezone_set('America/Guayaquil');

class CartasController extends AbstractActionController
{
	protected $cartaDao;
	protected $tipoCartaDao;
	protected $empresaInternaDao;
	protected $empresaDao;
	protected $empleadoDao;
	protected $proyectoDao;
	protected $contactoDao;
	protected $obraDao;
	protected $cartaDestinatarioDao;
	protected $cartaFirmaDao;
	
    public function listadoAction()
    {
        $cartas = $this->getCartaDao ()->traerTodos ();
		
		return new ViewModel ( array (
				'cartas' => $cartas,
		) );
    }
    
    public function ingresarAction(){

   		$form = $this->getForm ();
    	
    	//FORMULARIO DE INGRESO DE INFORMACION
    	return new ViewModel ( array (
    			'formulario' => $form ,
    			'tipo_usuario' => $this->tipo_usuario,
    			'privado' => $this->privado,
    			'action' => $this->params()->fromRoute('action')
    	) );
    }
    
    public function editarAction(){
    	 
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );

    	$form = $this->getForm ();
    	
    	//FORMULARIO DE ACTUALIZACION DE INFORMACION
    	$carta = $this->getCartaDao ()->traer ( $id );
    	
    	$form->bind ( $carta );
    		
    	$form->get ( 'PRO_ID' )->setAttribute ( 'value', $carta->getPro_id());
    	
    	$form->get ( 'proyecto_oculto' )->setAttribute('value', $carta->getPro_id());
    	$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
    	$form->get ( 'CTR_ID' )->setAttribute ( 'value', $carta->getCtr_id() );
    	
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($carta->getCtr_id());
    	
    	$form->get('contacto_oculto')->setAttribute('value', $carta_destinatario->getCon_id());
    	$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	$emp_emp_id = $empresa->getEmp_emp_id();
    	
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    		
    		$form->get('empresa_oculto')->setAttribute('value', $empresa_padre->getEmp_id());
    		$form->get('EMP_ID')->setAttribute('value', $empresa_padre->getEmp_id());
    		$form->get('sucursal_oculto')->setAttribute('value', $empresa->getEmp_id());
    		$form->get('SUC_ID')->setAttribute('value', $empresa->getEmp_id());
    		
    	}else{
    		$form->get('empresa_oculto')->setAttribute('value', $empresa->getEmp_id());
    		$form->get('EMP_ID')->setAttribute('value', $empresa->getEmp_id());
    	}
    	

    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCarta($carta->getCtr_id());
    	$array = array();
    	$i=0;
    	foreach ($carta_firma as $car){
    		$array[$i]['EPL_ID'] = $car->getEpl_id() . '<br />';
    		$array[$i]['CAR_FIR_TIPO'] = $car->getCar_fir_tipo() . '<br />';
    		$i++;
    	}
    	
    	$form->get('EPL_ID_UNO')->setAttribute('value', (int)$array[0]['EPL_ID']);
    	$form->get('CAR_FIR_TIPO')->setAttribute('checked', 'checked');
    	$form->get('EPL_ID_DOS')->setAttribute('value', (int)$array[1]['EPL_ID']);
    	
    	$view = new ViewModel ( array (
    			'formulario' => $form ,
    			//'tipo_usuario' => $this->tipo_usuario,
    			//'privado' => $this->privado,
    			//'id' => $id,
    			'action' => $this->params()->fromRoute('action')
    	) );
    	
    	$view->setTemplate('cartas/cartas/ingresar');
    	return $view;
    	
    }
    
    public function validarAction(){
    	
		//VERIFICA QUE SE HAYA REALIZADO UN POST DE INFORMACION
		if (! $this->request->isPost ()) {
			return $this->redirect ()->toRoute ( 'cartas', array (
					'controller' => 'cartas',
					'action' => 'listado' 
			) );
		}
		
		//CAPTURA LA INFORMACION ENVIADA EN EL POST
		$data = $this->request->getPost ();
		
		$form = $this->getForm();
		
		//SE VALIDA EL FORMULARIO
		$form->setInputFilter ( new CartaValidator() );
		
		//SE LLENAN LOS DATOS DEL FORMULARIO
		$form->setData ( $data );
		
		//SE VALIDA EL FORMULARIO ES CORRECTO
		if (! $form->isValid ()) {
			
			// SI EL FORMULARIO NO ES CORRECTO
			$modelView = new ViewModel ( array (
				'formulario' => $form ,
    			//'tipo_usuario' => $this->tipo_usuario,
    			//'privado' => $this->privado,
    			'action' => $this->params()->fromRoute('action')
			) );
			
			$modelView->setTemplate ( 'cartas/cartas/ingresar' );
			return $modelView;
		}
		
		//->AQUI EL FORMULARIO ES CORRECTO, SE VALIDO CORRECTAMENTE
		
		//SE GENERA EL OBJETO DE CONTACTO
		$carta = new CartaEntity();
		//SE CARGA LA ENTIDAD CON LA INFORMACION DEL POST
		$carta->exchangeArray ( $data );
		
		//SE GRABA LA INFORMACION EN LA BDD
		$codigo_carta = $this->getCartaDao() ->guardar ( $carta );
		
		//SI SE ACTUALIZA EL CONTACTO, SE BORRAN LOS DATOS ASOCIADOS
		if(!empty($data['CTR_ID']) && !is_null($data['CTR_ID'])){
			
			//SI EL USURIO ES DIFERENTE DE OPERADOR, PUEDE ELIMINAR LA INFORMACION

			$this->getCartaFirmaDao()->eliminarPorCarta($data['CTR_ID']);
			$this->getCartaDestinatarioDao()->eliminarPorCarta($data['CTR_ID']);
			
			$codigo_carta = $data['CTR_ID'];
		}else{
			$arreglo = array();
			foreach($codigo_carta as $codigo){
				$arreglo[] = $codigo;
			}
			
			$codigo_carta = $arreglo[0]['CURRVAL'];
		}
		
		//GRABA LA INFORMACION DEL DESTINATARIO DE LA CARTA
		$cartaDestinatario = new CartaDestinatario();
		$cartaDestinatarioParams['CTR_ID'] = $codigo_carta;
		$cartaDestinatarioParams['CON_ID'] = $data['CON_ID'];
		$cartaDestinatarioParams['CAR_DES_PRINCIPAL'] = 'S';
		$cartaDestinatario->exchangeArray($cartaDestinatarioParams);
		$this->getCartaDestinatarioDao()->guardar($cartaDestinatario);
		
		//GRABA LA INFORMACION DE QUIENES FIRMAN LA CARTA
		$cartaFirma = new CartaFirma();
		$cartaFirmaParams['CTR_ID'] = $codigo_carta;
		$cartaFirmaParams['EPL_ID'] = $data['EPL_ID_UNO'];
		
		if(strtoupper($data['CAR_FIR_TIPO']) == 'P'){
			$cartaFirmaParams['CAR_FIR_TIPO'] = 'P';
		}else{
			$cartaFirmaParams['CAR_FIR_TIPO'] = 'S';
		}
		
		
		$cartaFirma->exchangeArray($cartaFirmaParams);
		$this->getCartaFirmaDao()->guardar($cartaFirma);
		
		if(!empty($data['EPL_ID_DOS']) && !is_null($data['EPL_ID_DOS'])){
		
		$cartaFirma = new CartaFirma();
		$cartaFirmaParams['CTR_ID'] = $codigo_carta;
		$cartaFirmaParams['EPL_ID'] = $data['EPL_ID_DOS'];
		
		if(strtoupper($data['CAR_FIR_TIPO']) == 'P'){
			$cartaFirmaParams['CAR_FIR_TIPO'] = 'S';
		}else{
			$cartaFirmaParams['CAR_FIR_TIPO'] = 'P';
		}
		
		$cartaFirma->exchangeArray($cartaFirmaParams);
		$this->getCartaFirmaDao()->guardar($cartaFirma);
		}
		
        //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
		return $this->redirect ()->toRoute ( 'cartas', array (
				'controller' => 'cartas',
				'action' => 'listado' 
		) );
    }
    
    public function procesarAction(){
    	
    	date_default_timezone_set('America/Guayaquil');
    	$anio = date('Y');
    	
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$ei = $this->getCartaDao()->traerEmpresaInterna($id);
    	
    	foreach ($ei as $emp){
    		$empresa_interna = $emp->getEmp_int_abreviacion();
    	}
    	
    	$role = $_SESSION['Zend_Auth']['storage']->us_role;
    	
    	
    	switch ($role){
    		case 1:
    			$text_role = 'ADM';
    			break;
    		case 3:
    			$text_role = 'OPE';
    			break;
    		case 2:
    			$text_role = 'ADM';
    			break;
    		default:
    			$text_role = 'OPE';
    			break;
    	}
    	
    	$this->getCartaDao()->procesar($id, $text_role, $anio, $empresa_interna);
    	$this->redirect()->toRoute('cartas', array('controller' => 'cartas', 'action' => 'listado'));
    	
    }
    
    public function duplicarAction(){
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$carta = $this->getCartaDao()->traer($id);

    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCarta($carta->getCtr_id());
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($carta->getCtr_id());
    	
    	$ctr_id = $this->getCartaDao() ->duplicar ( $carta );
    	
    	$arreglo = array();
    	foreach($ctr_id as $codigo){
    		$arreglo[] = $codigo;
    	}
    		
    	$codigo_carta = $arreglo[0]['CURRVAL'];
    	
    	$this->getCartaDestinatarioDao() ->duplicar ( $carta_destinatario, $codigo_carta );
    	
    	foreach ($carta_firma as $fir){
    		$this->getCartaFirmaDao() ->duplicar ( $fir, $codigo_carta );
    	}
    	
    	
    	$this->redirect()->toRoute('cartas', array('controller' => 'cartas', 'action' => 'listado'));
    	
    }
   
    public function getForm() {
    	
    	$form = new Carta();
    	$form->get ( 'TIP_CAR_ID' )->setValueOptions ( $this->getTipoCartaDao ()->traerTodosArreglo () );
    	$form->get ( 'EMP_INT_ID' )->setValueOptions ( $this->getEmpresaInternaDao ()->traerTodosArreglo () );
    	$form->get ( 'EMP_ID' )->setValueOptions ( $this->getEmpresaDao ()->traerEmpresas () );
    	$form->get ( 'EPL_ID_UNO' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
    	$form->get ( 'EPL_ID_DOS' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
    	$form->get ( 'PRO_ID' )->setValueOptions ( $this->getProyectoDao ()->traerTodosArreglo () );
    	return $form;
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

    public function getEmpresaInternaDao() {
    	if (! $this->empresaInternaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->empresaInternaDao = $sm->get ( 'Cartas\Model\Dao\EmpresaInternaDao' );
    	}
    	return $this->empresaInternaDao;
    }

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