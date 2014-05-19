<?php

namespace Contactos\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

date_default_timezone_set('America/Guayaquil');

class Contacto extends Form {
	function __construct($name = null) {
		
		parent::__construct($name);
		
		/* ********************************************
		 * CAMPO CODIGO PRIMARIO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CON_ID',
				'attributes' => array (
						'type' => 'hidden',
						'maxlength' => '11',
						'id' => 'CON_ID',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO EMPRESA OCULTO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'sucursal_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlength' => '11',
						'id' => 'sucursal_oculto',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO ESTADO OCULTO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'estado_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlength' => '11',
						'id' => 'estado_oculto',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO CIUDAD OCULTO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'ciudad_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlength' => '11',
						'id' => 'ciudad_oculto',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO EMPRESA
		 * ********************************************/
		$empresa = new Select('EMP_ID');
		$empresa->setLabel('Empresa*: ');
		$empresa->setAttributes(array('id' => 'EMP_ID'));
		$empresa->setAttributes(array('class' => 'form-control'));
		$empresa->setEmptyOption('-- Seleccione --');
		//$pais->setValue('1');
		$empresa->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($empresa);
		
		/* ********************************************
		 * CAMPO SUCURSAL
		 * ********************************************/
		$sucursal = new Select('SUC_ID');
		$sucursal->setLabel('Sucursal: ');
		$sucursal->setAttributes(array('id' => 'SUC_ID'));
		$sucursal->setAttributes(array('disabled' => 'disabled'));
		$sucursal->setAttributes(array('class' => 'form-control'));
		$sucursal->setEmptyOption('-- Seleccione --');
		//$pais->setValue('1');
		$sucursal->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($sucursal);
		
		
		/* ********************************************
		 * CAMPO PAIS
		 * ********************************************/
		$pais = new Select('PAI_ID');
		$pais->setLabel('Pa&iacute;s*: ');
		$pais->setAttributes(array('class' => 'form-control'));
		$pais->setAttributes(array('id' => 'PAI_ID'));
		$pais->setEmptyOption('-- Seleccione --');
		$pais->setValue('63');
		$pais->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($pais);
		
		/* ********************************************
		 * CAMPO ESTADO
		 * ********************************************/
		$estado = new Select('EST_ID');
		$estado->setLabel('Estado/Provincia*: ');
		$estado->setAttributes(array('class' => 'form-control'));
		$estado->setAttributes(array('id' => 'EST_ID'));
		$estado->setEmptyOption('-- Seleccione --');
		$estado->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($estado);
		
		/* ********************************************
		 * CAMPO CIUDAD
		 * ********************************************/
		$ciudad = new Select('CIU_ID');
		$ciudad->setLabel('Ciudad*: ');
		$ciudad->setAttributes(array('class' => 'form-control'));
		$ciudad->setAttributes(array('id' => 'CIU_ID'));
		$ciudad->setEmptyOption('-- Seleccione --');
		//$pais->setValue('63');
		$ciudad->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($ciudad);
		
		/* ********************************************
		 * CAMPO NOMBRE
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_NOMBRE',
				'options' => array (
						'label' => 'Nombre*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '35',
						'id' => 'CON_NOMBRE',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO APELLIDO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_APELLIDO',
				'options' => array (
						'label' => 'Apellido*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '35',
						'id' => 'CON_APELLIDO',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO EMAIL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_EMAIL',
				'options' => array (
						'label' => 'Email Empresarial*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '150',
						'id' => 'CON_EMAIL',
						'class' => 'form-control'
				)
		) );
		
	
		/* ********************************************
		 * CAMPO USUARIO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_USUARIO',
				'options' => array (
						'label' => 'Usuario que ingresa la informaci&oacute;n:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '20',
						'id' => 'CON_USUARIO',
						'class' => 'form-control',
						'readonly' => 'readonly',
						//'value' => 'manucv'
						'value' => $_SESSION['Zend_Auth']['storage']->us_codigo
				)
		) );
		
		/* ********************************************
		 * CAMPO FECHA DE ACTUALIZACION
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_FECHA_ACTUALIZACION',
				'options' => array (
						'label' => 'Fecha de Actualizaci&oacute;n*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '10',
						'id' => 'CON_FECHA_ACTUALIZACION',
						'class' => 'form-control',
						'readonly' => 'readonly',
						'value' => date('d/m/Y')
				)
		) );
		
		/* ********************************************
		 * CAMPO PRIVADO
		 * ********************************************/
		
		$privado = new Select('CON_PRIVADO');
		$privado->setLabel('&iquest; Es informaci&oacute;n Privada?: ');
		$privado->setAttributes(array('class' => 'form-control'));
		$privado->setEmptyOption('-- Seleccione --');
		$privado->setValue('N');
		$privado->setValueOptions(array(
				'S' => 'S&iacute;',
				'N' => 'No',
		)
		);
		
		$this->add($privado);
		
		/* ********************************************
		 * CAMPO FECHA DE NACIMIENTO PERSONAL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_FECHA_NACIMIENTO_PERSONAL',
				'options' => array (
						'label' => 'Fecha de Nacimiento:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '150',
						'id' => 'CON_FECHA_NACIMIENTO_PERSONAL',
						'class' => 'form-control fecha_nacimiento',
				)
		) );
		
		/* ********************************************
		 * CAMPO EMAIL PERSONAL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_EMAIL_PERSONAL',
				'options' => array (
						'label' => 'Email Personal:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '150',
						'id' => 'CON_EMAIL_PERSONAL',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO CODIGO DE PAIS
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_CODIGO_PAIS',
				'options' => array (
						'label' => 'C&oacute;digo de Pa&iacute;s:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '5',
						'id' => 'CON_CODIGO_PAIS',
						'readonly' => 'readonly', 
						'class' => 'form-control codigo_telefono',
				)
		) );
		
		/* ********************************************
		 * CAMPO CODIGO DE CIUDAD
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_CODIGO_CIUDAD',
				'options' => array (
						'label' => 'C&oacute;digo de Ciudad:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '5',
						'id' => 'CON_CODIGO_CIUDAD',
						'readonly' => 'readonly',
						'class' => 'form-control codigo_telefono',
				)
		) );
		
		/* ********************************************
		 * CAMPO TELEFONO DE DOMICILIO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_TELEFONO_DOMICILIO_PER',
				'options' => array (
						'label' => 'Tel&eacute;fono de Domicilio:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '15',
						'id' => 'CON_TELEFONO_DOMICILIO_PER',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO CELULAR PERSONAL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_CELULAR_PERSONAL',
				'options' => array (
						'label' => 'Celular Personal:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '15',
						'id' => 'CON_CELULAR_PERSONAL',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO OBSERVACIONES
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_OBSERVACIONES',
				'options' => array (
						'label' => 'Observaciones:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '4000',
						'id' => 'CON_OBSERVACIONES',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO CON_OBSERVACIONES_PRIVADO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CON_OBSERVACIONES_PRIVADO',
				'options' => array (
						'label' => 'Observaciones:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '4000',
						'id' => 'CON_OBSERVACIONES_PRIVADO',
						'class' => 'form-control',
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CARGO ESPAÑOL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_DESCRIPCION_ES',
				'options' => array (
						'label' => 'Cargo Espa&ntilde;ol*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '30',
						'id' => 'CON_DESCRIPCION_ES',
						'class' => 'form-control',
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CARGO INGLES
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_DESCRIPCION_EN',
				'options' => array (
						'label' => 'Cargo Ingl&eacute;s*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '30',
						'id' => 'CON_DESCRIPCION_EN',
						'class' => 'form-control',
				)
		) );
		
		
		/* ********************************************
		 * CAMPO TIPO PERSONA ESPAÑOL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_TIP_PER_ES',
				'options' => array (
						'label' => 'Tipo Persona Espa&ntilde;ol*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '30',
						'id' => 'CON_TIP_PER_ES',
						'class' => 'form-control',
				)
		) );
		
		
		/* ********************************************
		 * CAMPO TIPO PERSONA INGLES
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_TIP_PER_EN',
				'options' => array (
						'label' => 'Tipo Persona Ingl&eacute;s*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '30',
						'id' => 'CON_TIP_PER_EN',
						'class' => 'form-control',
				)
		) );
		
		
		/* ********************************************
		 * CAMPO DIRECCION PUBLICA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_DIRECCION',
				'options' => array (
						'label' => 'Direcci&oacute;n*:'
				),
				'attributes' => array (
						'type' => 'textarea',
						'maxlength' => '150',
						'id' => 'CON_DIRECCION',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO DIRECCION PRIVADA
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CON_DIRECCION_DOMICILIO_PER',
				'options' => array (
						'label' => 'Direcci&oacute;n de domicilio:'
				),
				'attributes' => array (
						'type' => 'textarea',
						'maxlength' => '150',
						'id' => 'CON_DIRECCION_DOMICILIO_PER',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO SECRETARIA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_SECRETARIA',
				'options' => array (
						'label' => 'Nombre de la secretaria:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '70',
						'id' => 'CON_SECRETARIA',
						'class' => 'form-control',
				)
		) );
		
		
		/* ********************************************
		 * CAMPO TELEFONO DE LA SECRETARIA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CON_SECRETARIA_TELEFONO',
				'options' => array (
						'label' => 'Tel&eacute;fono de la secretaria:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '15',
						'id' => 'CON_SECRETARIA_TELEFONO',
						'class' => 'form-control',
				)
		) );
		
		
		/* ********************************************
		 * CAMPO ESTADO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CON_ESTADO',
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '1',
						'value' => 'A',
						'id' => 'CON_ESTADO',
						'class' => 'form-control',
				)
		) );
		
		/************ INFORMACION DE CONTACTO RELACIONADO ****************/
		 
		$indice_contacto_relacionado = 0;
		for ( $indice_contacto_relacionado=0; $indice_contacto_relacionado<5; $indice_contacto_relacionado++ ){
		$this->add(array(
				'name' => 'CONTACTO_RELACIONADO['.$indice_contacto_relacionado.'][TIP_CON_ID]',
				'type' => 'Zend\Form\Element\Select',
				'options' => array(
						'label' => 'Tipo de contacto',
						'disable_inarray_validator' => true,
						'empty_option' => '-- Seleccione --'
				),
				'attributes' => array(
						'id' => 'CONTACTO_RELACIONADO['.$indice_contacto_relacionado.'][TIP_CON_ID]',
						'class' => 'form-control tip_con_id',
						'data-group-id' => $indice_contacto_relacionado
				)
		));
		
		$this->add(array(
				'name' => 'CONTACTO_RELACIONADO['.$indice_contacto_relacionado.'][CON_REL_VALOR]',
				'options' => array(
						'label' => 'Valor',
				),
				'attributes' => array(
						'type' => 'text',
						'id' => 'CONTACTO_RELACIONADO['.$indice_contacto_relacionado.'][CON_REL_VALOR]',
						'class' => 'form-control con_rel_valor',
						'data-group-id' => $indice_contacto_relacionado
				)
		));
		
		
		}
		 

		/************ INFORMACION DE DETALLE DE CONTACTO **************/
		
		//$indice_detalle_contacto=0;
		
		for ( $indice_detalle_contacto=0; $indice_detalle_contacto<5; $indice_detalle_contacto++ ){
			
			$this->add(array(
					'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][oculto]',
					'attributes' => array(
							'type' => 'text',
							'id' => 'DETALLE_CONTACTO_oculto_'.$indice_detalle_contacto,
							'class' => 'form-control oculto',
							'data-group-id' => $indice_detalle_contacto
					)
			));
			
			
			$this->add(array(
					'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][TIP_TEL_ID]',
					'type' => 'Zend\Form\Element\Select',
					'options' => array(
							'label' => 'Tipo de Tel&eacute;fono',
							'disable_inarray_validator' => true,
							'empty_option' => '-- Seleccione --'
					),
					'attributes' => array(
							'id' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][TIP_TEL_ID]',
							'class' => 'form-control tip_tel_id',
							'data-group-id' => $indice_detalle_contacto
					)
			));
			
			$this->add(array(
					'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_PAIS]',
					'type' => 'Zend\Form\Element\Select',
					'options' => array(
							'label' => 'C&oacute;digo de Pa&iacute;s',
							'disable_inarray_validator' => true,
							'empty_option' => '-- Seleccione --'
					),
					'attributes' => array(
							'id' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_PAIS]',
							'class' => 'form-control det_con_codigo_pais',
							'data-group-id' => $indice_detalle_contacto
					)
			));
			
			$this->add(array(
					'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_CIUDAD]',
					'type' => 'Zend\Form\Element\Select',
					'options' => array(
							'label' => 'C&oacute;digo de Ciudad',
							'disable_inarray_validator' => true,
							'empty_option' => '-- Seleccione --'
					),
					'attributes' => array(
							'id' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_CIUDAD]',
							'class' => 'form-control det_con_codigo_ciudad',
							'data-group-id' => $indice_detalle_contacto
					)
			));
			
			$this->add(array(
					'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_VALOR]',
					'type' => 'Zend\Form\Element\Text',
					'options' => array(
							'label' => 'N&uacute;mero',
					),
					'attributes' => array(
							'id' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_VALOR]',
							'class' => 'form-control det_con_valor',
							'data-group-id' => $indice_detalle_contacto
					)
			));
			
			$this->add(array(
					'name' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_EXTENSION]',
					'type' => 'Zend\Form\Element\Text',
					'options' => array(
							'label' => 'Extensi&oacute;n',
					),
					'attributes' => array(
							'id' => 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_EXTENSION]',
							'class' => 'form-control det_con_extension',
							'data-group-id' => $indice_detalle_contacto
					)
			));
			
			
		}
		
		//BOTON DE SUBMIT
		$this->add ( array (
				'name' => 'ingresar',
				'attributes' => array (
						'type' => 'submit',
						'value' => 'Ingresar',
						'class' => 'btn btn-primary',
						'data-loading-text' => 'Loading...'
				)
		) );
		
	}
}