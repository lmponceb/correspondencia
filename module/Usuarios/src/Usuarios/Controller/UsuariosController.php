<?php
namespace Usuarios\Controller;

use Usuarios\Model\Entity\RolUsuario;
use Usuarios\Model\Entity\RolAplicacion;
use Usuarios\Model\Entity\Rol;
use Usuarios\Form\UsuariosForm;
use Usuarios\Form\RolForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

 class UsuariosController extends AbstractActionController
 {

    protected $rolDao;
    protected $rolAplicacionDao;
    protected $aplicacionDao;    
    protected $rolUsuarioDao;
    protected $vistaUsuarioDao;

     protected $max_detalle_contacto=5;

     public function indexAction()
     {
        return new ViewModel(array(
            'usuarios' => $this->getVistaUsuarioDao()->traerTodos()
        ));
     }

    public function addAction()
    {
        $form = new UsuariosForm();
        $form->get('US_CODIGO')->setValueOptions($this->getVistaUsuarioDao()->getUsuariosSelect());
        $form->get('ROL_ID')->setValueOptions($this->getRolDao()->getRolesSelect());

        return new ViewModel ( array (
                'title' => 'Crear Empresa',
                'form' => $form,
        ));
    }

     public function editAction()
     {
        $us_codigo = $this->params()->fromRoute ( 'id', 0 );
        if (! $us_codigo) {
            return $this->redirect()->toRoute ( 'usuarios' );
        }
        

        $form = new UsuariosForm();
        $form->get('US_CODIGO')->setValueOptions($this->getVistaUsuarioDao()->getUsuariosSelect());
        $form->get('ROL_ID')->setValueOptions($this->getRolDao()->getRolesSelect());

        $rolUsuario = $this->getRolUsuarioDao()->traerPorUsCodigo ( $us_codigo );

        if(is_object($rolUsuario)){
            $form->bind ( $rolUsuario );   
        }
        else{
            //$rolUsuario=$this->getRolUsuarioDao();
            //$rolUsuario->setUs_codigo('admin');
        }

        $viewModel = new ViewModel (array(
                'title' => 'Editar Empresa',
                'form' => $form
        ));
        
        $viewModel->setTemplate ( 'usuarios/usuarios/add.phtml' );
        return $viewModel;

     }

     public function guardarAction()
     {
        if(!$this->getRequest()->isPost()){
            return $this->redirect()->toRoute('usuarios',array('controller'=>'usuarios'));
        }

        $params=$this->request->getPost();

        $rolUsuario=new RolUsuario();
        $rolUsuario->exchangeArray($params);
        $this->getRolUsuarioDao()->eliminarPorUsuario($params['US_CODIGO']);
        $this->getRolUsuarioDao()->guardar($rolUsuario);

        return $this->redirect()->toRoute('usuarios',array('controller'=>'usuarios'));
     }

    public function rolesAction()
     {
        //$this->getEmpresasDao()->traerTodosPorJerarquia();

        return new ViewModel(array(
            'roles' => $this->getRolDao()->traerTodos()
        ));
     }

    public function addRolAction()
    {
        $form = new RolForm();
        $aplicaciones=$this->getAplicacionDao()->traerTodos();
        return new ViewModel ( array (
                'title' => 'Crear Rol',
                'form' => $form,
                'aplicaciones' => $aplicaciones
        ));
    }

        public function editRolAction()
    {

       $rol_id = $this->params()->fromRoute ( 'id', 0 );
        if (! $rol_id) {
            return $this->redirect()->toRoute ( 'usuarios ' ,array('controller'=>'usuarios', 'action' => 'roles'));
        }
        $form = new RolForm();
        $aplicaciones=$this->getAplicacionDao()->traerTodos();
        $rol = $this->getRolDao()->traerPorId ( $rol_id );
        $rolApl=$this->getRolAplicacionDao()->traerPorRol ($rol_id );
        $form->bind ( $rol );

        $viewModel = new ViewModel ( array (
                'title' => 'Editar Rol',
                'form' => $form,
                'aplicaciones' => $aplicaciones,
                'rolApl' =>$rolApl
        ));

       $viewModel->setTemplate ( 'usuarios/usuarios/add-rol.phtml' );
        return $viewModel;


    }

     public function guardarRolAction()
     {
        if(!$this->getRequest()->isPost()){
            return $this->redirect()->toRoute('usuarios',array('controller'=>'usuarios', 'action'=>'roles'));
        }

        $params=$this->request->getPost();

        $rol=new Rol();
        $rol->exchangeArray($params);
        $this->getRolDao()->guardar($rol);

        $aplicacionesArray=$params['APLICACION'];
        if($params['ROL_ID']!='')
            $this->getRolAplicacionDao()->eliminarPorRol($params['ROL_ID']);


        foreach($aplicacionesArray as $aplicacionParams){
            if($aplicacionParams!='' && $aplicacionParams!=NULL){
                $rolAplicacion=new RolAplicacion();
                $aplicacionParams['ROL_ID']=$params['ROL_ID'];

                $rolAplicacion->exchangeArray($aplicacionParams);
                $this->getRolAplicacionDao()->guardar($rolAplicacion);
            }
        }

        return $this->redirect()->toRoute('usuarios',array('controller'=>'usuarios', 'action'=>'roles'));
     }

     public function getRolDao()
     {
         if (!$this->rolDao) {
             $sm = $this->getServiceLocator();
             $this->rolDao = $sm->get('Usuarios\Model\Dao\RolDao');
         }
         return $this->rolDao;
     }

     public function getRolAplicacionDao()
     {
         if (!$this->rolAplicacionDao) {
             $sm = $this->getServiceLocator();
             $this->rolAplicacionDao = $sm->get('Usuarios\Model\Dao\RolAplicacionDao');
         }
         return $this->rolAplicacionDao;
     }

      public function getAplicacionDao()
     {
         if (!$this->aplicacionDao) {
             $sm = $this->getServiceLocator();
             $this->aplicacionDao = $sm->get('Usuarios\Model\Dao\AplicacionDao');
         }
         return $this->aplicacionDao;
     }

     public function getRolUsuarioDao()
     {
         if (!$this->rolUsuarioDao) {
             $sm = $this->getServiceLocator();
             $this->rolUsuarioDao = $sm->get('Usuarios\Model\Dao\RolUsuarioDao');
         }
         return $this->rolUsuarioDao;
     }

     public function getVistaUsuarioDao()
     {
         if (!$this->vistaUsuarioDao) {
             $sm = $this->getServiceLocator();
             $this->vistaUsuarioDao = $sm->get('Usuarios\Model\Dao\VistaUsuarioDao');
         }
         return $this->vistaUsuarioDao;
     }

     public function getForm() {
        $form = new EmpresasForm ( 'usuariosForm' );
        return $form;
     }

    public function consultaNombreRolXmlHttpAction()
     {  
        if($this->getRequest()->isXmlHttpRequest()){
            $rol_descripcion =  $this->getRequest()->getPost('ROL_DESCRIPCION');
            $rol_id =  $this->getRequest()->getPost('ROL_ID');
          
            $listado = $this->getRolDao()->existeDescripcion($rol_descripcion,$rol_id);   

            $response=$this->getResponse();
            $response->setStatusCode(200);
            $response->setContent($listado);
            return $response;
        }else{
            return $this->redirect()->toRoute('empresas',array('controller'=>'empresas'));
        }
     }     
     
 }
