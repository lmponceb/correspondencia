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

class CartasController extends AbstractActionController
{
	protected $cartaDao;
	protected $tipoCartaDao;
	protected $empresaInternaDao;
	protected $empresaDao;
	protected $empleadoDao;
	protected $proyectoDao;
	
    public function listadoAction()
    {
        $cartas = $this->getCartaDao ()->traerTodos ();
		
		return new ViewModel ( array (
				'cartas' => $cartas,
				
		) );
    }
    
    public function ingresarAction(){

    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	$lang = $this->params ()->fromRoute ( 'lang', 'E' );
    	
    	if(strtoupper($lang) === 'E'){
    		$form = $this->getForm ();
    	}else{
    		$form = $this->getFormIngles ();
    	}
    	
    	//$form->get ( 'CON_IDIOMA' )->setValue($lang);
    	
    	//FORMULARIO DE INGRESO DE INFORMACION
    	return new ViewModel ( array (
    			'formulario' => $form ,
    			'tipo_usuario' => $this->tipo_usuario,
    			'privado' => $this->privado,
    			'lang' => $lang,
    			'id' => $id,
    			'action' => $this->params()->fromRoute('action')
    	) );
    }
    
    public function editarAction(){
    	 
    }
    
    public function validarAction(){
    
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
    
    public function getFormIngles() {
	    
    	$form = new Carta ();
	    $form->get ( 'TIP_CAR_ID' )->setValueOptions ( $this->getTipoCartaDao ()->traerTodosArreglo () );
	    $form->get ( 'EMP_INT_ID' )->setValueOptions ( $this->getEmpresaInternaDao ()->traerTodosArreglo () );
	    $form->get ( 'EMP_ID' )->setValueOptions ( $this->getEmpresaDao ()->traerEmpresas () );
	    $form->get ( 'EPL_ID_UNO' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
	    $form->get ( 'EPL_ID_DOS' )->setValueOptions ( $this->getEmpleadoDao ()->traerTodosArreglo () );
	    $form->get ( 'PRO_ID' )->setValueOptions ( $this->getProyectoDao ()->traerTodosArreglo () );
	    return $form;
    }
    
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
}