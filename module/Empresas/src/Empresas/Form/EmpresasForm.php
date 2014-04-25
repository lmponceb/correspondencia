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
             'type' => 'Text',
             'options' => array(
                 'label' => 'Nombre',
             ),
        ));
     }
 }