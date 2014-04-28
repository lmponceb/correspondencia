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
     protected $empresasDao;
     protected $categoriasDao;
     protected $paisDao; 
     protected $estadoDao;
     protected $ciudadDao;     
     protected $tipoTelefonoDao;

     public function indexAction()
     {
        return new ViewModel(array(
            'empresas' => $this->getEmpresasDao()->traerTodos(),
        ));
     }

    public function addAction()
    {
        $form = new EmpresasForm();
        $form->get('CAT_EMP_ID')->setValueOptions($this->getCategoriasDao()->getCategoriasSelect());
        $form->get('PAI_ID')->setValueOptions($this->getPaisDao()->getPaisesSelect());
        $form->get('TIP_TEL_ID[]')->setValueOptions($this->getTipoTelefonoDao()->getTipoTelefonoSelect());
        $form->get('DET_CON_CODIGO_PAIS[]')->setValueOptions($this->getPaisDao()->getCodigoPaisesSelect());
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
        $this->getEmpresasDao()->guardar($empresa);

        return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
     }


     public function editAction()
     {
     }

     public function deleteAction()
     {
     }
     
     public function getEmpresasDao()
     {
         if (!$this->empresasDao) {
             $sm = $this->getServiceLocator();
             $this->empresasDao = $sm->get('Empresas\Model\Dao\EmpresasDao');
         }
         return $this->empresasDao;
     }

     public function getCategoriasDao()
     {
         if (!$this->categoriasDao) {
             $sm = $this->getServiceLocator();
             $this->categoriasDao = $sm->get('Empresas\Model\Dao\CategoriasDao');
         }
         return $this->categoriasDao;
     }

     public function getPaisDao()
     {
         if (!$this->paisDao) {
             $sm = $this->getServiceLocator();
             $this->paisDao = $sm->get('Empresas\Model\Dao\PaisDao');
         }
         return $this->paisDao;
     }

     public function getEstadoDao()
     {
         if (!$this->estadoDao) {
             $sm = $this->getServiceLocator();
             $this->estadoDao = $sm->get('Empresas\Model\Dao\EstadoDao');
         }
         return $this->estadoDao;
     }

     public function getCiudadDao()
     {
         if (!$this->ciudadDao) {
             $sm = $this->getServiceLocator();
             $this->ciudadDao = $sm->get('Empresas\Model\Dao\CiudadDao');
         }
         return $this->ciudadDao;
     }

     public function getTipoTelefonoDao()
     {
         if (!$this->tipoTelefonoDao) {
             $sm = $this->getServiceLocator();
             $this->tipoTelefonoDao = $sm->get('Empresas\Model\Dao\TipoTelefonoDao');
         }
         return $this->tipoTelefonoDao;
     }

    public function codigoCiudadAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $det_con_codigo_pais = $this->request->getPost('det_con_codigo_pais');
            $data = $this->getCiudadDao()->getCodigoCiudadPorCodigoPais($det_con_codigo_pais);
    
            $jsonData = json_encode($data);
            $response = $this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($jsonData);
    
            return $response;
        }else{
            return $this->redirect()->toRoute('empresas', array('empresas' => 'ingresar'));
        }
    }

     public function getForm() {
        $form = new EmpresasForm ( 'empresasForm' );
        return $form;
     }
 }
