<?php
namespace Empresas\Form;

 use Zend\Form\Form;

 class EmpresasForm extends Form
 {
     public function __construct($name = null)
     {
        parent::__construct('empresas');
        $this->setAttribute ( 'method', 'post' );
        $this->add(array(
             'name' => 'emp_id',
             'type' => 'Hidden',
        ));
        $this->add(array(
             'name' => 'emp_nombre',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Nombre',
             ),
            'attributes' => array(
                 'id' => 'emp_nombre'
             )
        ));
        $this->add(array(
             'name' => 'cat_emp_id',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Categoría',
             ),
             'attributes' => array(
                 'id' => 'cat_emp_id'
             )
        ));

        $this->add(array(
             'name' => 'emp_direccion',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Dirección',
             ),
             'attributes' => array(
                 'id' => 'emp_direccion'
             )
        ));

        $this->add(array(
             'name' => 'emp_referencia',
             'type' => 'Zend\Form\Element\Textarea',
             'options' => array(
                 'label' => 'Referencia',
             ),
             'attributes' => array(
                 'id' => 'emp_referencia'
             )
        ));

        $this->add(array(
             'name' => 'emp_sector',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Sector',
             ),
             'attributes' => array(
                 'id' => 'emp_sector'
             )
        ));

        $this->add(array(
             'name' => 'emp_email',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Email',
             ),
             'attributes' => array(
                 'id' => 'emp_email'
             )
        ));

        $this->add(array(
             'name' => 'emp_pagina_web',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Página Web',
             ),
             'attributes' => array(
                 'id' => 'emp_pagina_web'
             )
        ));

        $this->add(array(
             'name' => 'submit',
             'type' => 'submit',
             'attributes' => array(
                 'id' => 'submit'
             )
        ));

     }
 } 