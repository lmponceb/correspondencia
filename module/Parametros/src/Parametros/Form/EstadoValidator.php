<?php

namespace Parametros\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\StringLength;
use Zend\I18n\Validator\Alnum;
use Zend\Validator\Digits;
use Zend\Validator\NotEmpty;
use Zend\I18n\Filter\Alpha;


class EstadoValidator extends InputFilter {
	function __construct() {
		
		$est_id = new Input ( 'EST_ID' );
		$est_id->setRequired ( false );
		$est_id->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 4,
				'min' => 1
		) ) )->attach ( new Digits () );
		
		$this->add ( $est_id );
		
		
		$pai_id = new Input ( 'PAI_ID' );
		$pai_id->setRequired ( true );
		$pai_id->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 4,
				'min' => 1,
		) ) )->attach(new NotEmpty())
		->attach ( new Digits () );
		
		$this->add ( $pai_id );
		
		
		$est_nombre = new Input ( 'EST_NOMBRE' );
		$est_nombre->setRequired ( true );
		$est_nombre->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 150,
		) ) )->attach ( new Alnum ( array (
				'allowWhiteSpace' => true 
		) ) )->attach(new NotEmpty());
		
		
		$this->add ( $est_nombre );
		
	}
}