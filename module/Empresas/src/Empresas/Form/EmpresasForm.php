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
             'name' => 'EMP_ID',
             'type' => 'Hidden',
             'attributes' => array (
                'id' => 'emp_id',
            )
        ));
        
        $this->add ( array(
                'name' => 'ESTADO_OCULTO',
                'attributes' => array (
                        'type' => 'hidden',
                        'maxlenght' => '11',
                        'id' => 'estado_oculto',
                )
        ) );
        
        $this->add ( array(
                'name' => 'CIUDAD_OCULTO',
                'attributes' => array (
                        'type' => 'hidden',
                        'maxlenght' => '11',
                        'id' => 'ciudad_oculto',
                )
        ) );


        $this->add(array(
             'name' => 'EMP_NOMBRE',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Nombre',
             ),
            'attributes' => array(
                 'id' => 'emp_nombre',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_EMP_ID',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Sucursal de',
             ),
            'attributes' => array(
                 'id' => 'emp_emp_id',
                 'class' => 'form-control',
                 'placeholder' => 'Ingrese el nombre de la empresa a la que pertenece'
             )
        ));

        $this->add(array(
             'name' => 'CAT_EMP_ID',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Categoría',
                 'empty_option' => '-- Seleccione --'                 
             ),
             'attributes' => array(
                 'id' => 'cat_emp_id',
                 'class' => 'form-control'
             )
        ));


        $this->add(array(
             'name' => 'PAI_ID',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'País',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --'
             ),
             'attributes' => array(
                 'id' => 'PAI_ID',
                 'class' => 'form-control'
             )
        ));
        
        $this->add(array(
             'name' => 'EST_ID',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Estado/Provincia',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --'
             ),
             'attributes' => array(
                 'id' => 'EST_ID',
                 'class' => 'form-control'
             )
        ));


        $this->add(array(
             'name' => 'CIU_ID',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Ciudad',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --'
             ),
             'attributes' => array(
                 'id' => 'CIU_ID',
                 'class' => 'form-control'
             )
        ));
      

        $this->add(array(
             'name' => 'EMP_DIRECCION',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Dirección',
             ),
             'attributes' => array(
                 'id' => 'emp_direccion',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_REFERENCIA',
             'type' => 'Zend\Form\Element\Textarea',
             'options' => array(
                 'label' => 'Referencia',
             ),
             'attributes' => array(
                 'id' => 'emp_referencia',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_SECTOR',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Sector',
             ),
             'attributes' => array(
                 'id' => 'emp_sector',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_EMAIL',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Email',
             ),
             'attributes' => array(
                 'id' => 'emp_email',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_PAGINA_WEB',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Página Web',
             ),
             'attributes' => array(
                 'id' => 'emp_pagina_web',
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

        /************ Contacto Telefónico **************/
        $indice_detalle_contacto=0;

        $this->add(array(
             'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][TIP_TEL_ID]',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Tipo de Teléfono',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --'
             ),
             'attributes' => array(
                 'id' => 'tip_tel_id',
                 'class' => 'form-control tip_tel_id',
                 'data-group-id' => $indice_detalle_contacto
             )
        ));

        $this->add(array(
             'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_PAIS]',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Código de País',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --'
             ),
             'attributes' => array(
                 'id' => 'det_con_codigo_pais',
                 'class' => 'form-control det_con_codigo_pais',
                 'data-group-id' => $indice_detalle_contacto
             )
        ));

        $this->add(array(
             'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_CIUDAD]',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Código de Ciudad',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --'
             ),
             'attributes' => array(
                 'id' => 'det_con_codigo_ciudad',
                 'class' => 'form-control det_con_codigo_ciudad',
                 'data-group-id' => $indice_detalle_contacto
             )
        ));

        $this->add(array(
             'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_VALOR]',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Número',
             ),
             'attributes' => array(
                 'id' => 'det_con_valor',
                 'class' => 'form-control det_con_valor',
                 'data-group-id' => $indice_detalle_contacto
             )
        ));        

        $this->add(array(
             'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_EXTENSION]',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Extensión',
             ),
             'attributes' => array(
                 'id' => 'det_con_extension',
                 'class' => 'form-control det_con_extension',
                 'data-group-id' => $indice_detalle_contacto
             )
        )); 

        $this->add(array(
             'name' => 'ADD',
             'type' => 'Zend\Form\Element\Button',
             'options' => array(
                 'label' => 'Agregar Otro Número',
             ),
             'attributes' => array(
                 'id' => 'add',
                 'value' => 'Agregar',
                 'class' => 'btn btn-success',
                 'data-group-id' => $indice_detalle_contacto
             )
        ));
     }
 } 