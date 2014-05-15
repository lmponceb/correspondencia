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
use Cartas\Form\Carta;
use Cartas\Model\Entity\Carta as CartaEntity;

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
    		
    	//TRAER LOS CONTACTOS RELACIONADOS
    	//$contacto_relacionado = $this->getContactoRelacionadoDao()->traerPorContacto($id);
    		
    	//TRAER LOS DETALLES DE CONTACTO
    	//$detalle_contacto = $this->getDetalleContactoDao()->traerPorContacto($id);
    	
    	$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
    	$form->get ( 'CTR_ID' )->setAttribute ( 'value', $carta->getCtr_id() );
    		
    	$empresa = $this->getEmpresaDao()->traer($carta->getEmp_id());
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
    		
    	$view = new ViewModel ( array (
    			'formulario' => $form ,
    			'tipo_usuario' => $this->tipo_usuario,
    			'privado' => $this->privado,
    			'id' => $id,
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
		
		//LLENA LOS CAMPOS OCULTOS PARA GENERAR LA FUNCION READY DE JQUERY
		$data['contacto_oculto'] = $data['CON_ID'];
		$data['sucursal_oculto'] = $data['SUC_ID'];
		//$data['ciudad_oculto'] = $data['CIU_ID'];
		
		
		$form = $this->getForm();
		
		//SE VALIDA EL FORMULARIO
		//$form->setInputFilter ( new ContactoValidator () );
		
		//SE LLENAN LOS DATOS DEL FORMULARIO
		$form->setData ( $data );
		
		//SE VALIDA EL FORMULARIO ES CORRECTO
		/* if (! $form->isValid ()) {
			
			echo '<pre>';
			print_r('no valido');
			echo '<pre>';
			
			die();
			
			// SI EL FORMULARIO NO ES CORRECTO
			$modelView = new ViewModel ( array (
				'formulario' => $form ,
    			'tipo_usuario' => $this->tipo_usuario,
    			'privado' => $this->privado,
    			'action' => $this->params()->fromRoute('action')
			) );
			
			$modelView->setTemplate ( 'contactos/index/ingresar' );
			return $modelView;
		} */
		
		//->AQUI EL FORMULARIO ES CORRECTO, SE VALIDO CORRECTAMENTE
		
		//SE GENERA EL OBJETO DE CONTACTO
		$carta = new CartaEntity();
		//SE CARGA LA ENTIDAD CON LA INFORMACION DEL POST
		$carta->exchangeArray ( $data );
		
		//SE GRABA LA INFORMACION EN LA BDD
		$codigo_carta = $this->getCartaDao() ->guardar ( $carta );
		
		//SI SE ACTUALIZA EL CONTACTO, SE BORRAN LOS DATOS ASOCIADOS
		if(!empty($data['CAR_ID']) && !is_null($data['CAR_ID'])){
			
			$this->getCartaDestinoDao()->eliminarPorCarta($data['CAR_ID']);
			
			//SI EL USURIO ES DIFERENTE DE OPERADOR, PUEDE ELIMINAR LA INFORMACION
			if(strtoupper($this->tipo_usuario) != 'O'){
				$this->getContactoRelacionadoDao()->eliminarPorContacto($data['CAR_ID']);
			}
			
			$codigo_carta = $data['CAR_ID'];
		}else{
			$arreglo = array();
			foreach($codigo_carta as $codigo){
				$arreglo[] = $codigo;
			}
			
			$codigo_carta = $arreglo[0]['CURRVAL'];
		}
		
		/* $detalleContacto = new DetalleContacto();
		$detalleContactoParams['CON_ID'] = $codigo_carta;
		$detalleContacto->exchangeArray($detalleContactoParams);
		$this->getDetalleContactoDao()->guardar($detalleContacto); */
		
        //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
		return $this->redirect ()->toRoute ( 'cartas', array (
				'controller' => 'cartas',
				'action' => 'listado' 
		) );
    }
    
    public function eliminarAction(){
    
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
    
    /* public function getFormIngles() {
	    
    	$form = new Carta ();
	    $form->get ( 'TIP_CAR_ID' )->setValueOptions ( $this->getTipoCartaDao ()->traerTodosArreglo () );
	    $form->get ( 'EMP_INT_ID' )->setValueOptions ( $this->getEmpresaInternaDao ()->traerTodosArreglo () );
	    $form->get ( 'EMP_ID' )->setValueOptions ( $this->getEmpresaDao ()->traerEmpresas () );
	    $form->get ( 'EPL_ID_UNO' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
	    $form->get ( 'EPL_ID_DOS' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
	    $form->get ( 'PRO_ID' )->setValueOptions ( $this->getProyectoDao ()->traerTodosArreglo () );
	    return $form;
    } */
    
    public function getCartaDao() {
    	if (! $this->cartaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->cartaDao = $sm->get ( 'Cartas\Model\Dao\CartaDao' );
    	}
    	return $this->cartaDao;
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
    }
    
    public function getObraDao() {
    	if (! $this->obraDao) {
    		$sm = $this->getServiceLocator ();
    		$this->obraDao = $sm->get ( 'Cartas\Model\Dao\ObraDao' );
    	}
    	return $this->obraDao;
    }
    
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
    }
    
    public function obraAction(){
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
    }
    
}