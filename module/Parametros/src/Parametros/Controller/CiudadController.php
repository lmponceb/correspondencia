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
use Parametros\Form\Ciudad;
use Parametros\Form\CiudadValidator;
use Parametros\Model\Entity\Ciudad as CiudadEntity;

class CiudadController extends AbstractActionController
{
	protected $ciudadDao;
	protected $estadoDao;
	
    public function listadoAction()
    {
        return array('ciudad' => $this->getCiudadDao()->traerTodos());
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
    	$ciudad = $this->getCiudadDao()->traer ( $id );
    	$form->bind ( $ciudad );
    
    	$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
    	$form->get ( 'CIU_ID' )->setAttribute ( 'value', $ciudad->getCiu_id() );
    
    	$view = new ViewModel ( array (
    			'formulario' => $form ,
    	) );
    
    	$view->setTemplate('parametros/ciudad/ingresar');
    	return $view;
    }
    
    public function eliminarAction(){
    
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    
    	//SE ELIMINA LA INFORMACION EN LA BDD
    	if($this->getCiudadDao() ->eliminar ( $id )){
            //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
            return $this->redirect ()->toRoute ( 'parametros', array (
                    'controller' => 'ciudad',
                    'action' => 'listado'
            ) );    
        }
        else{
            //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
            $view = new ViewModel ();
        
            $view->setTemplate('parametros/ciudad/errorBorrado');
            return $view;            
        }
    }

    
    public function validarAction(){
    
    	//VERIFICA QUE SE HAYA REALIZADO UN POST DE INFORMACION
    	if (! $this->request->isPost ()) {
    		return $this->redirect ()->toRoute ( 'parametros', array (
    				'controller' => 'ciudad',
    				'action' => 'listado'
    		) );
    	}
    
    	//CAPTURA LA INFORMACION ENVIADA EN EL POST
    	$data = $this->request->getPost ();
    
    	//VERIFICA EL IDIOMA INGRESADO PARA TRAER EL FORMULARIO SEGUN EL IDIOMA
    	$form = $this->getForm();
    
    	//SE VALIDA EL FORMULARIO
    	$form->setInputFilter ( new CiudadValidator() );
    
    	//SE LLENAN LOS DATOS DEL FORMULARIO
    	$form->setData ( $data );
    
    	//SE VALIDA EL FORMULARIO ES CORRECTO
    	if (! $form->isValid ()) {
    		// SI EL FORMULARIO NO ES CORRECTO
    		$modelView = new ViewModel ( array (
    				'formulario' => $form ,
    		) );
    		 
    		$modelView->setTemplate ( 'parametros/ciudad/ingresar' );
    		return $modelView;
    	}
    
    	//->AQUI EL FORMULARIO ES CORRECTO, SE VALIDO CORRECTAMENTE
    
    	//SE GENERA EL OBJETO DE CONTACTO
    	$ciudad = new CiudadEntity();
    	//SE CARGA LA ENTIDAD CON LA INFORMACION DEL POST
    	$ciudad->exchangeArray ( $data );
    
    	//SE GRABA LA INFORMACION EN LA BDD
    	$this->getCiudadDao() ->guardar ( $ciudad );
    
    	//SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
    	return $this->redirect ()->toRoute ( 'parametros', array (
    			'controller' => 'ciudad',
    			'action' => 'listado'
    	) );
    }
    
    public function getForm() {
    	$form = new Ciudad();
    	$form->get ( 'EST_ID' )->setValueOptions ( $this->getEstadoDao ()->traerTodosArreglo () );
    	return $form;
    }
    
    public function getEstadoDao() {
    	if (! $this->estadoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->estadoDao = $sm->get ( 'Parametros\Model\Dao\EstadoDao' );
    	}
    	return $this->estadoDao;
    }
    
    public function getCiudadDao() {
    	if (! $this->ciudadDao) {
    		$sm = $this->getServiceLocator ();
    		$this->ciudadDao = $sm->get ( 'Parametros\Model\Dao\CiudadDao' );
    	}
    	return $this->ciudadDao;
    }

}
