<?php

namespace Parametros\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\StringLength;
use Zend\I18n\Validator\Alnum;
use Zend\Validator\Digits;
use Zend\Validator\NotEmpty;
use Zend\I18n\Filter\Alpha;


class PaisValidator extends InputFilter {
	function __construct() {
		
		$pai_id = new Input ( 'PAI_ID' );
		$pai_id->setRequired ( false );
		$pai_id->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 4,
				'min' => 1
		) ) )->attach ( new Digits () );
		
		$this->add ( $pai_id );
		
		
		$pai_nombre = new Input ( 'PAI_NOMBRE' );
		$pai_nombre->setRequired ( true );
		$pai_nombre->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 120,
		) ) )->attach ( new Alnum ( array (
				'allowWhiteSpace' => true 
		) ) )->attach(new NotEmpty());
		
		$this->add ( $pai_nombre );
		
		
		$pai_codigo_telefono = new Input ( 'PAI_CODIGO_TELEFONO' );
		$pai_codigo_telefono->setRequired ( true );
		$pai_codigo_telefono->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 5,
		) ) )->attach ( new Digits() )->attach(new NotEmpty());
		
		
		$this->add ( $pai_codigo_telefono );
		
	}
}