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

     protected $max_detalle_contacto=5;

     public function indexAction()
     {
        //$this->getEmpresasDao()->traerTodosPorJerarquia();
        return new ViewModel(array(
            'empresas' => $this->getEmpresasDao()->traerTodosPorJerarquia(),
        ));
     }

    public function addAction()
    {
         
        $form = new EmpresasForm(null,$this->max_detalle_contacto);
        $form->get('CAT_EMP_ID')->setValueOptions($this->getCategoriasDao()->getCategoriasSelect());
        $form->get('PAI_ID')->setValueOptions($this->getPaisDao()->getPaisesSelect());
        for($i=0;$i<$this->max_detalle_contacto;$i++){
            $form->get('DETALLE_CONTACTO['.$i.'][TIP_TEL_ID]')->setValueOptions($this->getTipoTelefonoDao()->getTipoTelefonoSelect());
            $form->get('DETALLE_CONTACTO['.$i.'][DET_CON_CODIGO_PAIS]')->setValueOptions($this->getPaisDao()->getCodigoPaisesSelect());
        }
        return new ViewModel ( array (
                'title' => 'Crear Empresa',
                'form' => $form,
                'max_contactos' => $this->max_detalle_contacto
        ));
    }

     public function editAction()
     {
        $emp_id = $this->params()->fromRoute ( 'id', 0 );
        if (! $emp_id) {
            return $this->redirect()->toRoute ( 'empresas' );
        }
        $indice_detalle_contacto=0;

        $form = new EmpresasForm(null,$this->max_detalle_contacto);

        $empresa = $this->getEmpresasDao ()->traerPorId ( $emp_id );

        $form->get('CAT_EMP_ID')->setValueOptions($this->getCategoriasDao()->getCategoriasSelect());
        $form->get('PAI_ID')->setValueOptions($this->getPaisDao()->getPaisesSelect());

        $form->get('EST_ID')->setValueOptions($this->getEstadoDao()->getEstadosPorPaisSelect($empresa->pai_id));
        $form->get('CIU_ID')->setValueOptions($this->getCiudadDao()->getCiudadesPorEstadoSelect($empresa->est_id));
        /*Carga de estados y ciudades en actualización*/
        $form->get( 'ESTADO_OCULTO' )->setValue( $empresa->est_id );
        $form->get( 'CIUDAD_OCULTO' )->setValue( $empresa->ciu_id );

        for($i=0;$i<$this->max_detalle_contacto;$i++){
            $form->get('DETALLE_CONTACTO['.$i.'][TIP_TEL_ID]')->setValueOptions($this->getTipoTelefonoDao()->getTipoTelefonoSelect());
            $form->get('DETALLE_CONTACTO['.$i.'][DET_CON_CODIGO_PAIS]')->setValueOptions($this->getPaisDao()->getCodigoPaisesSelect());
        }

        $form->bind ( $empresa );

        /* FUNCIÓN PARA RECUPERAR LOS DETALLES DE CONTACTO POR ID DE LA EMPRESA */
        $detallesContactos=$this->getDetalleContactoDao()->getDetallePorEmpresa($empresa->emp_id);        

        $viewModel = new ViewModel (array(
                'title' => 'Editar Empresa',
                'form' => $form,
                'detalles' => $detallesContactos,
                'max_contactos' => $this->max_detalle_contacto
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

        //VERIFICA EL IDIOMA INGRESADO PARA TRAER EL FORMULARIO SEGUN EL IDIOMA 
        $form = $this->getForm(new EmpresasForm(null,$this->max_detalle_contacto));
        $form->setInputFilter ( new EmpresasValidator (null,$this->max_detalle_contacto) );

        $form->setData ( $params );

        if (!$form->isValid ()) {

            $form->get('CAT_EMP_ID')->setValueOptions($this->getCategoriasDao()->getCategoriasSelect());
            $form->get('PAI_ID')->setValueOptions($this->getPaisDao()->getPaisesSelect());

            $form->get('EST_ID')->setValueOptions($this->getEstadoDao()->getEstadosPorPaisSelect($params->pai_id));
            $form->get('CIU_ID')->setValueOptions($this->getCiudadDao()->getCiudadesPorEstadoSelect($params->est_id));
            
            /*Carga de estados y ciudades en actualización*/
            $form->get( 'ESTADO_OCULTO' )->setValue( $params->est_id );
            $form->get( 'CIUDAD_OCULTO' )->setValue( $params->ciu_id );

            for($i=0;$i<$this->max_detalle_contacto;$i++){
                $form->get('DETALLE_CONTACTO['.$i.'][TIP_TEL_ID]')->setValueOptions($this->getTipoTelefonoDao()->getTipoTelefonoSelect());
                $form->get('DETALLE_CONTACTO['.$i.'][DET_CON_CODIGO_PAIS]')->setValueOptions($this->getPaisDao()->getCodigoPaisesSelect());
            }

            /* FUNCIÓN PARA RECUPERAR LOS DETALLES DE CONTACTO POR ID DE LA EMPRESA */
            //$detallesContactos=$params->DETALLE_CONTACTO;    
            /*
            for ($j=0; $j<count($params['DETALLE_CONTACTO']); $j++){

                $form->get('DETALLE_CONTACTO['.$j.'][TIP_TEL_ID]')->setValue($params['DETALLE_CONTACTO'][$j]['TIP_TEL_ID']);
                $form->get('DETALLE_CONTACTO['.$j.'][DET_CON_CODIGO_PAIS]')->setValue($params['DETALLE_CONTACTO'][$j]['DET_CON_CODIGO_PAIS']);
                $form->get('DETALLE_CONTACTO['.$j.'][DET_CON_CODIGO_CIUDAD]')->setValue($params['DETALLE_CONTACTO'][$j]['DET_CON_CODIGO_CIUDAD']);
                $form->get('DETALLE_CONTACTO['.$j.'][DET_CON_VALOR]')->setValue($params['DETALLE_CONTACTO'][$j]['DET_CON_VALOR']);
                $form->get('DETALLE_CONTACTO['.$j.'][DET_CON_EXTENSION]')->setValue($params['DETALLE_CONTACTO'][$j]['DET_CON_EXTENSION']);
            }   
            */

            $viewModel = new ViewModel (array(
                'title' => 'Editar Empresa',
                'form' => $form,
                'max_contactos' => $this->max_detalle_contacto
            ));
        
            $viewModel->setTemplate ( 'empresas/empresas/add.phtml' );
            return $viewModel;
            //die('No es valido');
        }else{
            //die('Si es valido');
        }

        /* //SE VALIDA EL FORMULARIO
        $form->setInputFilter ( new ContactoValidator () );
        
        //SE LLENAN LOS DATOS DEL FORMULARIO
        $form->setData ( $data );*/

        $empresa=new Empresas();
        $empresa->exchangeArray($params);
        $this->getEmpresasDao()->guardar($empresa);
        $detalleContactoParamsArray=$params['DETALLE_CONTACTO'];
        if($params['EMP_ID']!='')
            $this->getDetalleContactoDao()->eliminarPorEmpresa($params['EMP_ID']);

        foreach($detalleContactoParamsArray as $detalleContactoParams){
            if($detalleContactoParams['DET_CON_VALOR']!='' && $detalleContactoParams['DET_CON_VALOR']!=NULL){
                $detalleContacto=new DetalleContacto();
                $detalleContactoParams['EMP_ID']=$params['EMP_ID'];
                $detalleContacto->exchangeArray($detalleContactoParams);
                $this->getDetalleContactoDao()->guardar($detalleContacto);
            }
        }

        return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
     }

     /* Consulta XML Http 
        Devuelve en formato json una lista de las empresas padres* existentes en el sistema junto con su id
        *empresas padre: empresas que no pertenecen a ninguna otra, cuyo emp_emp_id=NULL
     */

     public function consultaXmlHttpAction()
     {  
        if($this->getRequest()->isXmlHttpRequest()){
            $term =  $this->getRequest()->getPost('term');
            $emp_id =  $this->getRequest()->getPost('emp_id');
          
            $listado = $this->getEmpresasDao()->traerListadoJsonPorNombre($term,$emp_id);   


            $response=$this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($listado);
            return $response;
        }else{

            return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
        }

     }

     public function consultaCedulaXmlHttpAction()
     {  
        if($this->getRequest()->isXmlHttpRequest()){
            $emp_documento =  $this->getRequest()->getPost('EMP_DOCUMENTO');
            $emp_id =  $this->getRequest()->getPost('EMP_ID');
          
            $listado = $this->getEmpresasDao()->existeDocumento($emp_documento,$emp_id);   

            $response=$this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($listado);
            return $response;
        }else{
            return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
        }
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

    public function activarAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $params=$this->request->getPost();
            //$empresa=new Empresas();
            $empresa = $this->getEmpresasDao ()->traerPorId ( $params['emp_id'] );
            $empresa->setEmp_id($params['emp_id']);
            $empresa->setEmp_estado($params['emp_estado']);
            $this->getEmpresasDao()->guardar($empresa);
          
            $response=$this->getResponse();
            $response->setStatusCode(200);
            $response->setContent('OK');
            return $response;
        }else{
            return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
        }
    }    

    public function desactivarAction()
    {
            $emp_id = $this->params()->fromRoute ( 'id', 0 ); 
            $empresa = $this->getEmpresasDao ()->traerPorId ( $emp_id );
            $empresa->setEmp_id($emp_id);
            $empresa->setEmp_estado('2');
            $this->getEmpresasDao()->guardar($empresa);
            return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));

    }   

 }
