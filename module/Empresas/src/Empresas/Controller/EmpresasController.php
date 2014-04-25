<?php
namespace Empresas\Controller;
use Empresas\Model\Empresas\Entity;
use Empresas\Model\Empresas\Dao;
use Empresas\Form\EmpresasValidator;
use Empresas\Form\EmpresasForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

 class EmpresasController extends AbstractActionController
 {
     protected $empresasTable;
     public function indexAction()
     {
        return new ViewModel(array(
            'empresas' => $this->getEmpresasTable()->traerTodos(),
        ));
     }

    public function addAction()
    {
        return new ViewModel ( array (
                'title' => 'Crear Partner',
                'form' => $this->getForm ()
        ) );
    }

     public function editAction()
     {
     }

     public function deleteAction()
     {
     }
     
     public function getEmpresasTable()
     {
         if (!$this->empresasTable) {
             $sm = $this->getServiceLocator();
             $this->empresasTable = $sm->get('Empresas\Model\Dao\Empresas');
         }
         return $this->empresasTable;
     }

    public function getForm() {
        $form = new EmpresasForm ( 'empresasForm' );
        return $form;
    }
 }
