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

class IndexController extends AbstractActionController {
	
	protected $contactoDao;
	protected $tipoPersonaDao;
	protected $empresaDao;
	protected $cargoDao;
	protected $paisDao;
	protected $sucursalDao;
	protected $ciudadDao;
	protected $estadoDao;
	private $privado = 'S';
	private $tipo_usuario = 'O';
	
	public function indexAction() {
		return $this->redirect ()->toRoute ( 'contactos', array (
					'controller' => 'index',
					'action' => 'ingresar' 
			) );
		
	}
	public function listadoAction() {
		return new ViewModel ( array (
				'contactos' => $this->getContactoDao ()->traerTodos ()
				
		) );
	}
	public function ingresarAction() {
		
		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
		$lang = $this->params ()->fromRoute ( 'lang', 'E' );
		
		if(strtoupper($lang) === 'E'){
			$form = $this->getForm ();
		}else{
			$form = $this->getFormIngles ();
		}
		
		//FORMULARIO DE INGRESO DE INFORMACION
		if (! isset ( $id ) || is_null ( $id ) || $id == 0) {
			return new ViewModel ( array (
				'formulario' => $form ,
				'tipo_usuario' => $this->tipo_usuario,
				'privado' => $this->privado
			) );
			
		}else{
			
			//FORMULARIO DE ACTUALIZACION DE INFORMACION
			$contacto = $this->getContactoDao ()->traer ( $id );
			$form->bind ( $contacto );
			
			$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
			$form->get ( 'CON_ID' )->setAttribute ( 'value', $contacto->getCon_id() );
			
			$sucursal = $this->getSucursalDao()->traer($contacto->getSuc_id());
			
			$form->get ( 'EMP_ID' )->setAttribute ( 'value', $sucursal->getEmp_id() );
			$form->get ( 'sucursal_oculto' )->setAttribute ( 'value', $contacto->getSuc_id() );
			
			if(strtoupper($this->tipo_usuario) != 'A'){
				
				if(strtoupper($contacto->getCon_privado()) == 'N'){
					$form->get ( 'CON_EMAIL_PERSONAL' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_FECHA_NACIMIENTO_PERSONAL' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_TELEFONO_DOMICILIO_PER' )->setAttribute ( 'readonly', 'readonly' );
					$form->get ( 'CON_CELULAR_PERSONAL' )->setAttribute ( 'readonly', 'readonly' );
					$this->privado = $contacto->getCon_privado();
				}
				
				if(strtoupper($contacto->getCon_privado()) == 'S'){
					$form->get ( 'CON_EMAIL_PERSONAL' )->setAttribute ( 'type', 'hidden' );
					$form->get ( 'CON_FECHA_NACIMIENTO_PERSONAL' )->setAttribute ( 'type', 'hidden' );
					$form->get ( 'CON_TELEFONO_DOMICILIO_PER' )->setAttribute ( 'type', 'hidden' );
					$form->get ( 'CON_CELULAR_PERSONAL' )->setAttribute ( 'type', 'hidden' );
					$this->privado = $contacto->getCon_privado();
				}
			}
			
		}
		
		return new ViewModel ( array (
				'formulario' => $form ,
				'tipo_usuario' => $this->tipo_usuario,
				'privado' => $this->privado
		) );
	}

	public function validar() {
		if (! $this->request->isPost ()) {
			return $this->redirect ()->toRoute ( 'contactos', array (
					'controller' => 'index',
					'action' => 'index' 
			) );
		}
		
		$data = $this->request->getPost ();
		$form = $this->getFormContacto ();
		$form->setInputFilter ( new ContactoValidator () );
		$form->setData ( $data );
		
		if (! $form->isValid ()) {
			
			$modelView = new ViewModel ( array (
					'formulario' => $form 
			) );
			
			// $modelView->setTemplate ( 'recetas/medicamento/nuevo' );
			return $modelView;
		}
		
		// $contacto = new MedicamentoEntity ();
		// $medicamento->exchangeArray ( $form->getData () );
		
		// $this->getMedicamento ()->guardar ( $medicamento );
		
		return $this->redirect ()->toRoute ( 'recetas', array (
				'controller' => 'medicamento' 
		) );
	}
	
	public function getForm() {
		$form = new Contacto ();
		
		$form->get ( 'TIP_PER_ID' )->setValueOptions ( $this->getTipoPersonaDao ()->traerTodosArreglo () );
		$form->get ( 'EMP_ID' )->setValueOptions ( $this->getEmpresaDao ()->traerTodosArreglo () );
		$form->get ( 'CAR_ID' )->setValueOptions ( $this->getCargoDao ()->traerTodosArreglo () );
		$form->get ( 'PAI_ID' )->setValueOptions ( $this->getPaisDao ()->traerTodosArreglo () );
		
		return $form;
	}
	
	public function sucursalesAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$empresa = $this->request->getPost('empresa');
			$data = $this->getSucursalDao()->getSucursalesPorEmpresa($empresa);
			
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
}
