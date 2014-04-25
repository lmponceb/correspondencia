<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuarios\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	
	private $paisDao;
	
    public function indexAction()
    {
        return new ViewModel(array(
        		'paises' => $this->getPaisDao()->traerTodos(),
        ));
    }
    
    private function getPaisDao(){
    	if(!$this->paisDao){
    		$sm = $this->getServiceLocator();
    		$this->paisDao = $sm->get('Usuarios\Model\Dao\PaisDao');
    	}
    	return $this->paisDao;
    }
}
