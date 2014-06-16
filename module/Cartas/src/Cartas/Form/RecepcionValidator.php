<?php

namespace Cartas\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\StringLength;
use Zend\I18n\Validator\Alnum;
use Zend\Validator\Digits;
use Zend\Validator\Date;
use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;
use Zend\Validator\InArray;
use Zend\I18n\Filter\Alpha;
use Zend\I18n\Validator\Float;


class RecepcionValidator extends InputFilter {
	function __construct() {
		
		$fe_rec_id = new Input ( 'FE_REC_ID' );
		$fe_rec_id->setRequired ( false );
		$fe_rec_id->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1 
		) ) )->attach ( new Digits () );
		
		$this->add ( $fe_rec_id );
		
		
		$empresa_interna = new Input ( 'EMP_INT_ID' );
		$empresa_interna->setRequired ( true );
		$empresa_interna->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 3,
				'min' => 1
		) ) )->attach(new NotEmpty())
		->attach ( new Digits () );
		
		$this->add ( $empresa_interna );
		
		
		$fe_rec_tipo = new Input ( 'FE_REC_TIPO' );
		$fe_rec_tipo->setRequired ( true );
		$fe_rec_tipo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 50,
		) ) )->attach(new NotEmpty())
		->attach(new Alnum(array(
				'allowWhiteSpace' => true,
		)));
		
		$this->add ( $fe_rec_tipo );
		
		
		$fe_rec_idioma = new Input ( 'FE_REC_IDIOMA' );
		$fe_rec_idioma->setRequired ( true );
		$fe_rec_idioma->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 1,
				'min' => 1
		) ) )->attach(new Alnum(array(
				'allowWhiteSpace' => false,
		)))->attach(new NotEmpty())
		->attach(new InArray(array(
				'haystack' => array('I','E'),
		)));
		
		$this->add ( $fe_rec_idioma );
		
		
		$us_codigo = new Input ( 'US_CODIGO' );
		$us_codigo->setRequired ( true );
		$us_codigo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 20,
				'min' => 1
		) ) )
		->attach(new NotEmpty());
		
		$this->add ( $us_codigo );
		
		
		$ctr_fecha_creacion = new Input ( 'CTR_FECHA_CREACION' );
		$ctr_fecha_creacion->setRequired ( true );
		$ctr_fecha_creacion->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 15,
				'min' => 8
		) ) )
		->attach(new NotEmpty());
		
		$this->add ( $ctr_fecha_creacion );
		
		
		/* $fe_rec_responsable = new Input ( 'FE_REC_RESPONSABLE' );
		$fe_rec_responsable->setRequired ( true );
		$fe_rec_responsable->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 70,
		) ) )->attach(new NotEmpty())
		->attach(new Alnum(array(
				'allowWhiteSpace' => true,
		)));
		
		$this->add ( $fe_rec_responsable );
		
		
		$fe_rec_descripcion = new Input ( 'FE_REC_DESCRIPCION' );
		$fe_rec_descripcion->setRequired ( true );
		$fe_rec_descripcion->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 200,
		) ) )->attach(new NotEmpty());
		
		$this->add ( $fe_rec_descripcion ); */
		
		
		$fe_rec_compania = new Input ( 'FE_REC_COMPANIA' );
		$fe_rec_compania->setRequired ( true );
		$fe_rec_compania->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 150,
		) ) )->attach(new NotEmpty());
		
		$this->add ( $fe_rec_compania );
		
		
		$fe_rec_oferente = new Input ( 'FE_REC_OFERENTE' );
		$fe_rec_oferente->setRequired ( true );
		$fe_rec_oferente->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 75,
		) ) )->attach(new NotEmpty());
		
		$this->add ( $fe_rec_oferente );
		
		
		$fe_rec_oferta_nombre = new Input ( 'FE_REC_OFERTA_NOMBRE' );
		$fe_rec_oferta_nombre->setRequired ( false );
		$fe_rec_oferta_nombre->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 75,
		) ) );
		
		$this->add ( $fe_rec_oferta_nombre );
		
		
		$fe_rec_oferta_codigo = new Input ( 'FE_REC_OFERTA_CODIGO' );
		$fe_rec_oferta_codigo->setRequired ( false );
		$fe_rec_oferta_codigo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 100,
		) ) );
		
		$this->add ( $fe_rec_oferta_codigo );
		
		
		$fe_rec_fecha = new Input ( 'FE_REC_FECHA' );
		$fe_rec_fecha->setRequired ( true );
		$fe_rec_fecha->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 15,
				'min' => 8
		) ) )
		->attach(new NotEmpty());
		
		$this->add ( $fe_rec_fecha );
		
		
		$fe_rec_fecha_hora = new Input ( 'FE_REC_FECHA_HORA' );
		$fe_rec_fecha_hora->setRequired ( true );
		$fe_rec_fecha_hora->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 2,
				'min' => 2
		) ) )->attach(new Digits());
		
		$this->add ( $fe_rec_fecha_hora );
		
		
		$fe_rec_fecha_minuto = new Input ( 'FE_REC_FECHA_MINUTO' );
		$fe_rec_fecha_minuto->setRequired ( true );
		$fe_rec_fecha_minuto->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 2,
				'min' => 2
		) ) )->attach(new Digits());
		
		$this->add ( $fe_rec_fecha_minuto );
		
		
		$fe_rec_sobre = new Input ( 'FE_REC_SOBRE' );
		$fe_rec_sobre->setRequired ( true );
		$fe_rec_sobre->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 200,
		) ) )->attach(new NotEmpty());
		
		$this->add ( $fe_rec_sobre );
		
		
		$fe_rec_oferta_nombre = new Input ( 'FE_REC_OFERTA_NOMBRE' );
		$fe_rec_oferta_nombre->setRequired ( true );
		$fe_rec_oferta_nombre->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 4000,
		) ) )->attach(new NotEmpty());
		
		$this->add ( $fe_rec_oferta_nombre );
		
		
		$fe_rec_estado = new Input ( 'FE_REC_ESTADO' );
		$fe_rec_estado->setRequired ( true );
		$fe_rec_estado->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 1,
				'min' => 1
		) ) )->attach(new Alnum(array(
				'allowWhiteSpace' => false,
		)))->attach(new NotEmpty())
		->attach(new InArray(array(
				'haystack' => array('B','P'),
		)));
		
		$this->add ( $fe_rec_estado );
		
	}
}