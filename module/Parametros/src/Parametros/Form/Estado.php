<?php

namespace Parametros\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

date_default_timezone_set('America/Guayaquil');

class Estado extends Form {
	function __construct($name = null) {
		
		parent::__construct($name);
		
		/* ********************************************
		 * CAMPO CODIGO PRIMARIO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'EST_ID',
				'attributes' => array (
						'type' => 'hidden',
						'maxlength' => '4',
						'id' => 'EST_ID',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO PAIS
		 * ********************************************/
		$pai_id = new Select('PAI_ID');
		$pai_id->setLabel('Pa&iacute;s*: ');
		$pai_id->setAttributes(array('id' => 'PAI_ID'));
		$pai_id->setAttributes(array('class' => 'form-control'));
		$pai_id->setEmptyOption('-- Seleccione --');
		$pai_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($pai_id);
		
		
		/* ********************************************
		 * CAMPO NOMBRE
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'EST_NOMBRE',
				'options' => array (
						'label' => 'Nombre del estado*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '150',
						'id' => 'EST_NOMBRE',
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