<?php

namespace Cartas\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

date_default_timezone_set('America/Guayaquil');

class Carta extends Form {
	function __construct($name = null) {
		
		parent::__construct($name);
		
		/* ********************************************
		 * CAMPO CODIGO PRIMARIO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_ID',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'CTR_ID',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO OBRA OCULTO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'obra_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'ciudad_oculto',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO EMPRESA INTERNA
		 * ********************************************/
		$emp_int_id = new Select('EMP_INT_ID');
		$emp_int_id->setLabel('Empresa Interna*: ');
		$emp_int_id->setAttributes(array('id' => 'EMP_INT_ID'));
		$emp_int_id->setAttributes(array('class' => 'form-control'));
		$emp_int_id->setEmptyOption('-- Seleccione --');
		$emp_int_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($emp_int_id);
		
		
		/* ********************************************
		 * CAMPO OBRA
		 * ********************************************/
		$obr_id = new Select('OBR_ID');
		$obr_id->setLabel('Obra*: ');
		$obr_id->setAttributes(array('id' => 'OBR_ID'));
		$obr_id->setAttributes(array('disabled' => 'disabled'));
		$obr_id->setAttributes(array('class' => 'form-control'));
		$obr_id->setEmptyOption('-- Seleccione --');
		$obr_id->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($obr_id);
		
		
		/* ********************************************
		 * CAMPO TIPO DE CARTA
		 * ********************************************/
		$tip_car_id = new Select('TIP_CAR_ID');
		$tip_car_id->setLabel('Tipo de Carta*: ');
		$tip_car_id->setAttributes(array('class' => 'form-control'));
		$tip_car_id->setAttributes(array('id' => 'TIP_CAR_ID'));
		$tip_car_id->setEmptyOption('-- Seleccione --');
		$tip_car_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($tip_car_id);
		
		
		/* ********************************************
		 * CAMPO PROYECTO
		 * ********************************************/
		$pro_id = new Select('PRO_ID');
		$pro_id->setLabel('Proyecto*: ');
		$pro_id->setAttributes(array('class' => 'form-control'));
		$pro_id->setAttributes(array('id' => 'PRO_ID'));
		$pro_id->setEmptyOption('-- Seleccione --');
		$pro_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($pro_id);
		
		
		/* ********************************************
		 * CAMPO IDIOMA
		 * ********************************************/
		$ctr_idioma = new Select('CTR_IDIOMA');
		$ctr_idioma->setLabel('Idioma*: ');
		$ctr_idioma->setAttributes(array('class' => 'form-control'));
		$ctr_idioma->setAttributes(array('id' => 'CTR_IDIOMA'));
		$ctr_idioma->setEmptyOption('-- Seleccione --');
		$ctr_idioma->setValueOptions(array(
				'E' => 'Espa&ntilde;ol',
				'I' => 'Ingl&eacute;s',
		));
		$ctr_idioma->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($ctr_idioma);
		
		
		/* ********************************************
		 * CAMPO USUARIO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'US_CODIGO',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '20',
						'id' => 'US_CODIGO',
						'class' => 'form-control',
						'value' => 'manucv'
						//'value' => $_SESSION['Zend_Auth']['storage']->doc_id
				)
		) );
		
		
		/* ********************************************
		 * CAMPO FECHA DE CREACION
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_FECHA_CREACION',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '10',
						'id' => 'CTR_FECHA_CREACION',
						'class' => 'form-control',
						'value' => date('d-M-Y')
				)
		) );
		
		/* ********************************************
		 * CAMPO CUERPO DE LA CARTA
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_CUERPO',
				'options' => array (
						'label' => 'Cuerpo*:'
				),
				'attributes' => array (
						'type' => 'textarea',
						//'cols' => '100',
						'rows' => '15',
						'id' => 'CTR_CUERPO',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CODIGO FINAL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_CODIGO_FINAL',
				'options' => array (
						'label' => 'C&oacute;digo Final*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '50',
						'readonly' => 'readonly', 
						'id' => 'CTR_CODIGO_FINAL',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO FECHA DE ACTUALIZACION
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_FECHA_ACTUALIZACION',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '10',
						'readonly' => 'readonly',
						'id' => 'CTR_FECHA_ACTUALIZACION',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO REFERENCIA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_REFERENCIA',
				'options' => array (
						'label' => 'Referencia*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '300',
						'id' => 'CTR_REFERENCIA',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO SALUDO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_SALUDO',
				'options' => array (
						'label' => 'Saludo*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						'id' => 'CTR_SALUDO',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO DESPEDIDA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_DESPEDIDA',
				'options' => array (
						'label' => 'Despedida*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						'id' => 'CTR_DESPEDIDA',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO TIPO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_TIPO',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '1',
						'value' => 'B',
						'id' => 'CTR_TIPO',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO ESTADO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_ESTADO',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '1',
						'value' => 'A',
						'id' => 'CTR_ESTADO',
						'class' => 'form-control'
				)
		) );
		
	
		
		/************ CAMPOS OTRAS TABLAS *************/
		
		
		/* ********************************************
		 * CAMPO FIRMA 1
		 * ********************************************/
		$epl_id_uno = new Select('EPL_ID_UNO');
		$epl_id_uno->setLabel('Firma 1*: ');
		$epl_id_uno->setAttributes(array('class' => 'form-control'));
		$epl_id_uno->setAttributes(array('id' => 'EPL_ID_UNO'));
		$epl_id_uno->setEmptyOption('-- Seleccione --');
		$epl_id_uno->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($epl_id_uno);
		
		
		/* ********************************************
		 * CAMPO CARGO 1
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CARGO_UNO',
				'options' => array (
						'label' => 'Cargo Firma 1*:'
				),
				'attributes' => array (
						'type' => 'text',
						'readonly' => 'readonly',
						'id' => 'CARGO_UNO',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO FIRMA 2
		 * ********************************************/
		$epl_id_dos = new Select('EPL_ID_DOS');
		$epl_id_dos->setLabel('Firma 2*: ');
		$epl_id_dos->setAttributes(array('class' => 'form-control'));
		$epl_id_dos->setAttributes(array('id' => 'EPL_ID_DOS'));
		$epl_id_dos->setEmptyOption('-- Seleccione --');
		$epl_id_dos->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($epl_id_dos);
		
		
		/* ********************************************
		 * CAMPO CARGO 2
		 * ********************************************/
		$this->add ( array (
				'name' => 'CARGO_DOS',
				'options' => array (
						'label' => 'Cargo Firma 2*:'
				),
				'attributes' => array (
						'type' => 'text',
						'readonly' => 'readonly',
						'id' => 'CARGO_DOS',
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
		 * CAMPO SUCURSAL OCULTO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'sucursal_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'sucursal_oculto',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CONTACTO
		 * ********************************************/
		$con_id = new Select('CON_ID');
		$con_id->setLabel('Destinatario*: ');
		$con_id->setAttributes(array('class' => 'form-control'));
		$con_id->setAttributes(array('id' => 'CON_ID'));
		$con_id->setAttributes(array('disabled' => 'disabled'));
		$con_id->setEmptyOption('-- Seleccione --');
		$con_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($con_id);
		
		/* ********************************************
		 * CAMPO CONTACTO OCULTO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'contacto_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'contacto_oculto',
						'class' => 'form-control'
				)
		) );
		
		
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