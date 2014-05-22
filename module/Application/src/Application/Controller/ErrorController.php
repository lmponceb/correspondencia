<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ErrorController extends AbstractActionController {
	
	public function indexAction(){
		return $this->forward()->dispatch('Application\Controller\Error', array('action' => 'denied'));
	}
	
	public function deniedAction(){
		return new ViewModel(array('mensaje' => 'Acceso Denegado'));
	}
	
}