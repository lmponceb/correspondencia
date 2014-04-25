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
	
	public function indexAction() {
		return array ();
		
	}
	public function listadoAction() {
		return new ViewModel ( array (
				'contactos' => $this->getContactoDao ()->traerTodos ()
				
		) );
	}
	public function ingresarAction() {
		return new ViewModel ( array (
				'formulario' => $this->getForm () ,
				'tipo_usuario' => 'A'
		) );
	}
	public function editarAction() {
		$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
		
		if (! isset ( $id ) || is_null ( $id )) {
			
			return $this->redirect ()->toRoute ( 'contactos', array (
					'controller' => 'index',
					'action' => 'index' 
			) );
		}
		
		$form = $this->getForm ();
		$medicamento = $this->getContactoDao ()->traer ( $id );
		$form->bind ( $medicamento );
		
		$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
		$form->get ( 'CON_ID' )->setAttribute ( 'value', $medicamento->getCon_id() );
		
		$modelView = new ViewModel ( array (
				'formulario' => $form,
				'tipo_usuario' => 'A'
		) );
		
		$modelView->setTemplate ( 'contactos/index/ingresar' );
		return $modelView;
	}
	public function guardar() {
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
			
			$jsonCities = json_encode($data);
			$response = $this->getResponse();
			$response->setStatusCode(200);
			$response->setContent($jsonCities);
			
			return $response;
		}else{
			return $this->redirect()->toRoute('contactos', array('contactos' => 'ingresar'));
		}
	}
	
	public function ciudadesAction(){
		if($this->getRequest()->isXmlHttpRequest()){
			$pais = $this->request->getPost('pais');
			$data = $this->getCiudadDao()->getCiudadesPorPais($pais);
				
			$jsonCities = json_encode($data);
			$response = $this->getResponse();
			$response->setStatusCode(200);
			$response->setContent($jsonCities);
				
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
}
