<?php
namespace Usuarios\Form;

 use Zend\Form\Form;

 class UsuariosForm extends Form
 {
     public function __construct($name = null, $max_detalle_contacto=5)
     {
        parent::__construct('usuarios');
        $this->setAttribute ( 'method', 'post' );

        $this->add(array(
             'name' => 'US_CODIGO',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Usuario*:',
                 'empty_option' => '-- Seleccione --'                 
             ),
             'attributes' => array(
                 'id' => 'us_codigo',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'ROL_ID',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Rol*:',
                 'empty_option' => '-- Seleccione --'                 
             ),
             'attributes' => array(
                 'id' => 'rol_id',
                 'class' => 'form-control'
             )
        ));



        $this->add(array(
             'name' => 'SUBMIT',
             'type' => 'submit',
             'attributes' => array(
                 'id' => 'submit',
                 'value' => 'Ingresar',
                 'class' => 'btn btn-primary'
             )
        ));

     }
 } 