<?php
namespace Empresas\Controller;
use Empresas\Model\Entity\Empresas;
use Empresas\Model\Entity\DetalleContacto;
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
     protected $detalleContactoDao;

     public function indexAction()
     {
        return new ViewModel(array(
            'empresas' => $this->getEmpresasDao()->traerTodos(),
        ));
     }

    public function addAction()
    {

        $indice_detalle_contacto=0;

        $form = new EmpresasForm();
        $form->get('CAT_EMP_ID')->setValueOptions($this->getCategoriasDao()->getCategoriasSelect());
        $form->get('PAI_ID')->setValueOptions($this->getPaisDao()->getPaisesSelect());
        $form->get('DETALLE_CONTACTO['.$indice_detalle_contacto.'][TIP_TEL_ID]')->setValueOptions($this->getTipoTelefonoDao()->getTipoTelefonoSelect());
        $form->get('DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_PAIS]')->setValueOptions($this->getPaisDao()->getCodigoPaisesSelect());
        return new ViewModel ( array (
                'title' => 'Crear Empresa',
                'form' => $form
        ));
    }

     public function editAction()
     {
        
        $emp_id = $this->params ()->fromRoute ( 'id', 0 );
        if (! $emp_id) {
            return $this->redirect()->toRoute ( 'empresas' );
        }
        $indice_detalle_contacto=0;

        $form = new EmpresasForm();

        $empresa = $this->getEmpresasDao ()->traerPorId ( $emp_id );
        $form->get('CAT_EMP_ID')->setValueOptions($this->getCategoriasDao()->getCategoriasSelect());
        $form->get('PAI_ID')->setValueOptions($this->getPaisDao()->getPaisesSelect());

        $form->get('EST_ID')->setValueOptions($this->getEstadoDao()->getEstadosPorPaisSelect($empresa->pai_id));
        $form->get('CIU_ID')->setValueOptions($this->getCiudadDao()->getCiudadesPorEstadoSelect($empresa->est_id));

        $form->get('DETALLE_CONTACTO['.$indice_detalle_contacto.'][TIP_TEL_ID]')->setValueOptions($this->getTipoTelefonoDao()->getTipoTelefonoSelect());
        $form->get('DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_PAIS]')->setValueOptions($this->getPaisDao()->getCodigoPaisesSelect());

        $form->bind ( $empresa );

        /* FUNCIÓN PARA RECUPERAR LOS DETALLES DE CONTACTO POR ID DE LA EMPRESA */
        $detallesContactos=$this->getDetalleContactoDao()->getDetallePorEmpresa($empresa->emp_id);        

        $viewModel = new ViewModel (array(
                'title' => 'Editar Empresa',
                'form' => $form,
                'detalles' => $detallesContactos
        ));
        
        $viewModel->setTemplate ( 'empresas/empresas/add.phtml' );
        return $viewModel;

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
        $detalleContactoParamsArray=$params['DETALLE_CONTACTO'];
        if($params['EMP_ID']!='')
            $this->getDetalleContactoDao()->eliminarPorEmpresa($params['EMP_ID']);

        foreach($detalleContactoParamsArray as $detalleContactoParams){
            $detalleContacto=new DetalleContacto();
            $detalleContactoParams['EMP_ID']=$params['EMP_ID'];
            $detalleContacto->exchangeArray($detalleContactoParams);
            $this->getDetalleContactoDao()->guardar($detalleContacto);
        }

        return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
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

     public function getDetalleContactoDao()
     {
         if (!$this->detalleContactoDao) {
             $sm = $this->getServiceLocator();
             $this->detalleContactoDao = $sm->get('Empresas\Model\Dao\DetalleContactoDao');
         }
         return $this->detalleContactoDao;
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
