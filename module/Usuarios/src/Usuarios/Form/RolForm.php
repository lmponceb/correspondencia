<?php
namespace Usuarios\Form;

 use Zend\Form\Form;

 class RolForm extends Form
 {
     public function __construct($name = null)
     {
        parent::__construct('roles');
        $this->setAttribute ( 'method', 'post' );


        $this->add(array(
             'name' => 'ROL_DESCRIPCION',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Nombre*:',
             ),
            'attributes' => array(
                 'id' => 'rol_descripcion',
                 'class' => 'form-control'
             )
        ));


        $this->add(array(
             'name' => 'ROL_ID',
             'type' => 'Hidden',
             'attributes' => array (
                'id' => 'rol_id',
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