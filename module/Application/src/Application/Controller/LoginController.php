<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Login as LoginService;
use Application\Form\Login;
use Application\Form\LoginValidator;

class LoginController extends AbstractActionController {
	
	private $login;
	
	public function indexAction() {
		
		$form = new Login ( 'login' );
		$loggedIn = $this->login->isLoggedIn ();

		$viewParams = array ('form' => $form );
		
		if ($loggedIn) {
			return $this->redirect ()->toRoute ( 'application', array (
					'controller' => 'index',
					'action' => 'index'
			) );
		}
		
		return $viewParams;
	}
	
	public function autenticarAction() {
		
		if (! $this->request->isPost ()) {
			$this->redirect ()->toRoute ( 'application', array (
					'controller' => 'login' 
			) );
		}
		
		$form = new Login ( 'login' );
		$form->setInputFilter ( new LoginValidator () );
		
		$data = $this->request->getPost ();
		
		$form->setData ( $data );
		
		if (! $form->isValid ()) {
			
			$modelView = new ViewModel ( array ( 'form' => $form	) );
			$modelView->setTemplate ( 'application/login/index' );
			return $modelView;
		}
		
		$values = $form->getData ();
		
		$usuario = $values ['usu_usuario'];
		$clave = $values ['usu_clave'];
		
		try {
			
			$this->login->setMessage ( 'El nombre de usuario o la contrase&ntilde;a son incorrectas.', LoginService::NOT_IDENTITY );
			$this->login->setMessage ( 'La contrase&ntilde;a ingresada no es correcta. Intentelo de nuevo', LoginService::INVALID_CREDENTIAL );
			$this->login->setMessage ( 'Los campos de usuario y contrase&ntilde;a no pueden dejarse en blanco.', LoginService::INVALID_LOGIN );
			$this->login->setMessage ( 'Usuario inactivo. Comun&iacute;quese con el administrador', LoginService::USER_INACTIVE );
			
			$this->login->login ( $usuario, $clave );
			
			//$docId = $this->login->getIdentity()->doc_id;

			$role = $this->login->getIdentity()->us_role;

			/*if(!empty($docId) && !is_null($docId) && strtolower($role) == 'medico'){
				return $this->redirect ()->toRoute ( 'recetas', array (
						'controller' => 'index',
						'action' => 'index'
				) );
			}elseif((empty($docId) || is_null($docId)) && strtolower($role) == 'admin'){
				return $this->redirect ()->toRoute ( 'administrador', array (
						'controller' => 'index',
						'action' => 'index'
				) );
			}else{
				return $this->redirect ()->toRoute ( 'application', array (
						'controller' => 'login',
						'action' => 'logout'
				) );
			}*/
			
			
			return $this->redirect ()->toRoute ( 'empresas', array (
				'controller' => 'index',
				'action' => 'index'
			) );
		} catch ( \Exception $e ) {
			
			$this->layout ()->mensaje = $e->getMessage ();
			
			$viewModel = new ViewModel ( array ( 'form' => new Login ( 'login' ) ) );
			$viewModel->setTemplate ( 'application/login/index' );
				
			return $viewModel;
			
		}
	}
	
	public function setLogin(LoginService $login) {
		$this->login = $login;
	}
	
	public function logoutAction(){
		$this->login->logout();
		session_destroy();
		//return $this->forward()->dispatch('Application\Controller\Login', array('action' => 'index'));
		
		return $this->redirect ()->toRoute ( 'application', array (
				'controller' => 'login',
				'action' => 'logout'
		) );
		
	}
}