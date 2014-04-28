<?php
namespace Empresas\Controller;
use Empresas\Model\Entity\Empresas;
use Empresas\Model\Dao\EmpresasDao;
use Empresas\Form\EmpresasForm;
use Empresas\Form\EmpresasValidator;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

 class EmpresasController extends AbstractActionController
 {
     protected $empresasTable;
     protected $categoriasTable;

     public function indexAction()
     {
        return new ViewModel(array(
            'empresas' => $this->getEmpresasTable()->traerTodos(),
        ));
     }

    public function addAction()
    {
        $form = new EmpresasForm();
        //print_r($this->getCategoriasTable()->getCategoriasSelect());
        $form->get('cat_emp_id')->setValueOptions($this->getCategoriasTable()->getCategoriasSelect());
        
        return new ViewModel ( array (
                'title' => 'Crear Partner',
                'form' => $form
        ) );
    }

     public function guardarAction()
     {
        if(!$this->getRequest()->isPost()){
            return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
        }

        $params=$this->request->getPost();

        $empresa=new Empresas();
        $empresa->exchangeArray($params);
        $this->getEmpresasTable()->guardar($empresa);

        return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
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
             $this->empresasTable = $sm->get('Empresas\Model\Dao\EmpresasDao');
         }
         return $this->empresasTable;
     }

     public function getCategoriasTable()
     {
         if (!$this->categoriasTable) {
             $sm = $this->getServiceLocator();
             $this->categoriasTable = $sm->get('Empresas\Model\Dao\CategoriasDao');
         }
         return $this->categoriasTable;
     }


    public function getForm() {
        $form = new EmpresasForm ( 'empresasForm' );
        return $form;
    }
 }
