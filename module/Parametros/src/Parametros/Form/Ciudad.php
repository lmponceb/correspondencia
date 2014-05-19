<?php

namespace Parametros\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

date_default_timezone_set('America/Guayaquil');

class Ciudad extends Form {
	function __construct($name = null) {
		
		parent::__construct($name);
		
		/* ********************************************
		 * CAMPO CODIGO PRIMARIO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CIU_ID',
				'attributes' => array (
						'type' => 'hidden',
						'maxlength' => '11',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO ESTADO
		 * ********************************************/
		$est_id = new Select('EST_ID');
		$est_id->setLabel('Estado*: ');
		$est_id->setAttributes(array('class' => 'form-control'));
		$est_id->setEmptyOption('-- Seleccione --');
		$est_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($est_id);
		
		
		/* ********************************************
		 * CAMPO NOMBRE
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CIU_NOMBRE',
				'options' => array (
						'label' => 'Nombre de la ciudad*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '150',
						'id' => 'CIU_NOMBRE',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CODIGO DE TELEFONO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CIU_CODIGO_TELEFONO',
				'options' => array (
						'label' => 'C&oacute;digo de Tel&eacute;fono*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '5',
						'id' => 'CIU_CODIGO_TELEFONO',
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