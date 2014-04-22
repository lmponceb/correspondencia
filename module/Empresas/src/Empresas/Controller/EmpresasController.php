<?php
namespace Empresas\Controller;
use Empresas\Model\Empresas;
use Empresas\Model\EmpresasTable;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;

 class EmpresasController extends AbstractActionController
 {
     protected $empresasTable;
     public function indexAction()
     {
        return new ViewModel(array(
            'empresas' => $this->getEmpresasTable()->fetchAll(),
        ));
     }

     public function addAction()
     {
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
             $this->empresasTable = $sm->get('Empresas\Model\EmpresasTable');
         }
         return $this->empresasTable;
     }
 }
