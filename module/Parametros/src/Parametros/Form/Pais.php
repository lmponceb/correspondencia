<?php

namespace Parametros\Form;

use Zend\Form\Form;

date_default_timezone_set('America/Guayaquil');

class Pais extends Form {
	function __construct($name = null) {
		
		parent::__construct($name);
		
		/* ********************************************
		 * CAMPO CODIGO PRIMARIO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'PAI_ID',
				'attributes' => array (
						'type' => 'hidden',
						'maxlength' => '4',
						'id' => 'PAI_ID',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO NOMBRE
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'PAI_NOMBRE',
				'options' => array (
						'label' => 'Nombre del pa&iacute;s*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '120',
						'id' => 'PAI_NOMBRE',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO APELLIDO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'PAI_CODIGO_TELEFONO',
				'options' => array (
						'label' => 'C&oacute;digo de Tel&eacute;fono*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlength' => '5',
						'id' => 'PAI_CODIGO_TELEFONO',
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