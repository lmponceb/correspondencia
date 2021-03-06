<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Parametros\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Parametros\Form\Estado;
use Parametros\Form\EstadoValidator;
use Parametros\Model\Entity\Estado as EstadoEntity;

class EstadoController extends AbstractActionController
{
	protected $estadoDao;
	protected $paisDao;
	
    public function listadoAction()
    {
        return array('estado' => $this->getEstadoDao()->traerTodos());
    }
    
    public function ingresarAction(){
    	 
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	$form = $this->getForm ();
    	 
    	//FORMULARIO DE INGRESO DE INFORMACION
    	return new ViewModel ( array (
    			'formulario' => $form ,
    	) );
    }
    
    public function editarAction(){
    
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	$form = $this->getForm ();
    
    	//FORMULARIO DE ACTUALIZACION DE INFORMACION
    	$estado = $this->getEstadoDao()->traer ( $id );
    	$form->bind ( $estado );
    
    	$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
    	$form->get ( 'EST_ID' )->setAttribute ( 'value', $estado->getEst_id() );
    
    	$view = new ViewModel ( array (
    			'formulario' => $form ,
    	) );
    
    	$view->setTemplate('parametros/estado/ingresar');
    	return $view;
    }
    
    public function eliminarAction(){

    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	 
    	//SE ELIMINA LA INFORMACION EN LA BDD
    	if($this->getEstadoDao() ->eliminar ( $id )){
            //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
            return $this->redirect ()->toRoute ( 'parametros', array (
                    'controller' => 'estado',
                    'action' => 'listado'
            ) );
        }else{
            $view = new ViewModel ();
        
            $view->setTemplate('parametros/estado/errorBorrado');
            return $view;                  
        }
    	 
    	
    }
    
    public function validarAction(){
    
    	//VERIFICA QUE SE HAYA REALIZADO UN POST DE INFORMACION
    	if (! $this->request->isPost ()) {
    		return $this->redirect ()->toRoute ( 'parametros', array (
    				'controller' => 'estado',
    				'action' => 'listado'
    		) );
    	}
    	 
    	//CAPTURA LA INFORMACION ENVIADA EN EL POST
    	$data = $this->request->getPost ();
    	 
    	//VERIFICA EL IDIOMA INGRESADO PARA TRAER EL FORMULARIO SEGUN EL IDIOMA
    	$form = $this->getForm();
    	 
    	//SE VALIDA EL FORMULARIO
    	$form->setInputFilter ( new EstadoValidator() );
    	 
    	//SE LLENAN LOS DATOS DEL FORMULARIO
    	$form->setData ( $data );
    	 
    	//SE VALIDA EL FORMULARIO ES CORRECTO
    	if (! $form->isValid ()) {
    		// SI EL FORMULARIO NO ES CORRECTO
    		$modelView = new ViewModel ( array (
    				'formulario' => $form ,
    		) );
    		 
    		$modelView->setTemplate ( 'parametros/estado/ingresar' );
    		return $modelView;
    	}
    	 
    	//->AQUI EL FORMULARIO ES CORRECTO, SE VALIDO CORRECTAMENTE
    	 
    	//SE GENERA EL OBJETO DE CONTACTO
    	$estado = new EstadoEntity();
    	//SE CARGA LA ENTIDAD CON LA INFORMACION DEL POST
    	$estado->exchangeArray ( $data );
    	 
    	//SE GRABA LA INFORMACION EN LA BDD
    	$this->getEstadoDao() ->guardar ( $estado );
    	 
    	//SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
    	return $this->redirect ()->toRoute ( 'parametros', array (
    			'controller' => 'estado',
    			'action' => 'listado'
    	) );
    }
    
    public function getForm() {
    	$form = new Estado ();
    	$form->get ( 'PAI_ID' )->setValueOptions ( $this->getPaisDao ()->traerTodosArreglo () );
    	return $form;
    }
    
    public function getEstadoDao() {
    	if (! $this->estadoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->estadoDao = $sm->get ( 'Parametros\Model\Dao\EstadoDao' );
    	}
    	return $this->estadoDao;
    }
    
    public function getPaisDao() {
    	if (! $this->paisDao) {
    		$sm = $this->getServiceLocator ();
    		$this->paisDao = $sm->get ( 'Parametros\Model\Dao\PaisDao' );
    	}
    	return $this->paisDao;
    }

}
