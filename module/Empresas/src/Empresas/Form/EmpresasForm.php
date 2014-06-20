<?php
namespace Empresas\Form;

 use Zend\Form\Form;

 class EmpresasForm extends Form
 {
     public function __construct($name = null, $max_detalle_contacto=5)
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

        $this->add(array(
             'name' => 'EMP_EMP_ID',
             'type' => 'Hidden',
             'attributes' => array (
                'id' => 'emp_emp_id',
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
                 'label' => 'Nombre*:',
             ),
            'attributes' => array(
                 'id' => 'emp_nombre',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_EMP_ID_AUTOCOMPLETAR',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Sucursal de:',
             ),
            'attributes' => array(
                 'id' => 'emp_emp_id_autocompletar',
                 'class' => 'form-control',
                 'placeholder' => 'Ingrese el nombre de la empresa a la que pertenece'
             )
        ));

        $this->add(array(
             'name' => 'CAT_EMP_ID',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Categoría:',
                 'empty_option' => '-- Seleccione --',      
                 'disable_inarray_validator' => true          
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
                 'label' => 'País*:',
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
                 'label' => 'Estado/Provincia*:',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --',      
                 'disable_inarray_validator' => true    
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
                 'label' => 'Ciudad*:',
                 'disable_inarray_validator' => true,
                 'empty_option' => '-- Seleccione --',      
                 'disable_inarray_validator' => true    
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
                 'label' => 'Dirección*:',
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
                 'label' => 'Referencia:',
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
                 'label' => 'Sector:',
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
                 'label' => 'Email:',
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
                 'label' => 'Página Web:',
             ),
             'attributes' => array(
                 'id' => 'emp_pagina_web',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_DOCUMENTO',
             'type' => 'Zend\Form\Element\Text',
             'options' => array(
                 'label' => 'Documento/RUC:',
             ),
             'attributes' => array(
                 'id' => 'emp_documento',
                 'class' => 'form-control'
             )
        ));

        $this->add(array(
             'name' => 'EMP_ESTADO',
             'type' => 'Zend\Form\Element\Select',
             'options' => array(
                 'label' => 'Estado*:',
                 'empty_option' => '-- Seleccione --',
                 'value_options' => array(
                    '1' => 'ACTIVO',
                    '2' => 'INACTIVO'
                 )
             ),
             'attributes' => array(
                 'id' => 'EMP_ESTADO',
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
        for ($i=0;$i<$max_detalle_contacto;$i++){

            $this->add(array(
                    'name' => 'DETALLE_CONTACTO['.$i.'][oculto]',
                    'attributes' => array(
                            'type' => 'text',
                            'id' => 'DETALLE_CONTACTO_oculto_'.$i,
                            'class' => 'form-control oculto',
                            'data-group-id' => $i
                    )
            ));

            $this->add(array(
                    'name' => 'DETALLE_CONTACTO['.$i.'][check]',
                    'type' => 'Zend\Form\Element\Checkbox',
                    'options' => array(
                            'checked_value' => 'S',
                            'unchecked_value' => 'N',
                    ),
                    'validators' => array(
                            'required' => false
                    ),
                    'attributes' => array(
                        'id' => 'check_'.$i,
                        'class' => 'form-control check',
                        'data-group-id' => $i
                    )
            ));

            $this->add(array(
                 'name' => 'DETALLE_CONTACTO['.$i.'][TIP_TEL_ID]',
                 'type' => 'Zend\Form\Element\Select',
                 'options' => array(
                     'label' => 'Tipo de Teléfono',
                     'disable_inarray_validator' => true,
                     'empty_option' => '-- Seleccione --'
                 ),
                 'attributes' => array(
                     'id' => 'tip_tel_id_'.$i,
                     'class' => 'form-control tip_tel_id',
                     'data-group-id' => $i
                 )
            ));

            $this->add(array(
                 'name' => 'DETALLE_CONTACTO['.$i.'][DET_CON_CODIGO_PAIS]',
                 'type' => 'Zend\Form\Element\Select',
                 'options' => array(
                     'label' => 'Cód. de País',
                     'disable_inarray_validator' => true,
                     'empty_option' => '-- Seleccione --'
                 ),
                 'attributes' => array(
                     'id' => 'det_con_codigo_pais_'.$i,
                     'class' => 'form-control det_con_codigo_pais',
                     'data-group-id' => $i
                 )
            ));

            $this->add(array(
                 'name' => 'DETALLE_CONTACTO['.$i.'][DET_CON_CODIGO_CIUDAD]',
                 'type' => 'Zend\Form\Element\Select',
                 'options' => array(
                     'label' => 'Cód. de Ciudad',
                     'disable_inarray_validator' => true,
                     'empty_option' => '-- Seleccione --'
                 ),
                 'attributes' => array(
                     'id' => 'det_con_codigo_ciudad_'.$i,
                     'class' => 'form-control det_con_codigo_ciudad',
                     'data-group-id' => $i
                 )
            ));

            $this->add(array(
                 'name' => 'DETALLE_CONTACTO['.$i.'][DET_CON_VALOR]',
                 'type' => 'Zend\Form\Element\Text',
                 'options' => array(
                     'label' => 'Número',
                 ),
                 'attributes' => array(
                     'id' => 'det_con_valor_'.$i,
                     'class' => 'form-control det_con_valor',
                     'data-group-id' => $i
                 )
            ));        

            $this->add(array(
                 'name' => 'DETALLE_CONTACTO['.$i.'][DET_CON_EXTENSION]',
                 'type' => 'Zend\Form\Element\Text',
                 'options' => array(
                     'label' => 'Extensión',
                 ),
                 'attributes' => array(
                     'id' => 'det_con_extension_'.$i,
                     'class' => 'form-control det_con_extension',
                     'data-group-id' => $i
                 )
            )); 
        }

        $this->add(array(
             'name' => 'ADD',
             'type' => 'Zend\Form\Element\Button',
             'options' => array(
                 'label' => 'Agregar Otro Número',
             ),
             'attributes' => array(
                 'id' => 'add',
                 'value' => 'Agregar',
                 'class' => 'btn btn-success')
        ));

        //echo '<pre>';
        //print_r($this);
        //echo '</pre>';
     }
 } 