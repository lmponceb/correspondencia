<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

	
	public function indexAction	() {

			return $this->redirect ()->toRoute ( 'application', array (
					'controller' => 'index',
					'action' => 'index'
			) );
	}
}