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


class CartaValidator extends InputFilter {
	function __construct() {
		
		$codigo = new Input ( 'CTR_ID' );
		$codigo->setRequired ( false );
		$codigo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1 
		) ) )->attach ( new Digits () );
		
		$this->add ( $codigo );
		
		
		$empresa_interna = new Input ( 'EMP_INT_ID' );
		$empresa_interna->setRequired ( true );
		$empresa_interna->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 3,
				'min' => 1
		) ) )->attach(new NotEmpty())
		->attach ( new Digits () );
		
		$this->add ( $empresa_interna );
		
		
		$tipo_carta = new Input ( 'TIP_CAR_ID' );
		$tipo_carta->setRequired ( true );
		$tipo_carta->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 2,
				'min' => 1
		) ) )->attach(new NotEmpty())
		->attach ( new Digits () );
		
		$this->add ( $tipo_carta );
		
		
		$proyecto = new Input ( 'PRO_ID' );
		$proyecto->setRequired ( true );
		$proyecto->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1
		) ) )->attach(new NotEmpty())
		->attach ( new Digits () );
		
		$this->add ( $proyecto );
		
		
		$idioma = new Input ( 'CTR_IDIOMA' );
		$idioma->setRequired ( true );
		$idioma->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 1,
				'min' => 1
		) ) )->attach(new Alnum(array(
				'allowWhiteSpace' => false,
		)))->attach(new NotEmpty())
		->attach(new InArray(array(
				'haystack' => array('I','E'),
		)));
		
		$this->add ( $idioma );
		
		
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
		
		
		$ctr_cuerpo = new Input ( 'CTR_CUERPO' );
		$ctr_cuerpo->setRequired ( true );
		$ctr_cuerpo->getValidatorChain ()
		->attach(new NotEmpty());
		
		$this->add ( $ctr_cuerpo );
		
		
		$ctr_referencia = new Input ( 'CTR_REFERENCIA' );
		$ctr_referencia->setRequired ( false );
		$ctr_referencia->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 300,
		) ) );
		
		$this->add ( $ctr_referencia );
		
		
		$ctr_saludo = new Input ( 'CTR_SALUDO' );
		$ctr_saludo->setRequired ( true );
		$ctr_saludo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 100,
		) ) )
		->attach(new NotEmpty());
		
		$this->add ( $ctr_saludo );
		
		
		$ctr_despedida = new Input ( 'CTR_DESPEDIDA' );
		$ctr_despedida->setRequired ( true );
		$ctr_despedida->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 100,
		) ) )
		->attach(new NotEmpty());
		
		$this->add ( $ctr_despedida );
		
		
		$ctr_tipo = new Input ( 'CTR_TIPO' );
		$ctr_tipo->setRequired ( true );
		$ctr_tipo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 1,
				'min' => 1
		) ) )->attach(new Alnum(array(
				'allowWhiteSpace' => false,
		)))->attach(new NotEmpty())
		->attach(new InArray(array(
				'haystack' => array('B','P'),
		)));
		
		$this->add ( $ctr_tipo );
		
		$ctr_estado = new Input ( 'CTR_ESTADO' );
		$ctr_estado->setRequired ( true );
		$ctr_estado->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 1,
				'min' => 1
		) ) )->attach(new Alnum(array(
				'allowWhiteSpace' => false,
		)))->attach(new NotEmpty())
		->attach(new InArray(array(
				'haystack' => array('A','I'),
		)));
		
		$this->add ( $ctr_estado );
		
		
		$epl_id_uno = new Input ( 'EPL_ID_UNO' );
		$epl_id_uno->setRequired ( true );
		$epl_id_uno->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1,
		) ) )
		->attach(new NotEmpty());
		
		$this->add ( $epl_id_uno );
		
		
		$epl_id_dos = new Input ( 'EPL_ID_DOS' );
		$epl_id_dos->setRequired ( false );
		$epl_id_dos->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1,
		) ) );
		
		$this->add ( $epl_id_dos );
		
		
		$emp_id = new Input ( 'EMP_ID' );
		$emp_id->setRequired ( true );
		$emp_id->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1
		) ) )->attach(new NotEmpty())
		->attach ( new Digits () );
		
		$this->add ( $emp_id );
		
		
		$suc_id = new Input ( 'SUC_ID' );
		$suc_id->setRequired ( false );
		$suc_id->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
		) ) )->attach ( new Digits () );
		
		$this->add ( $suc_id );
		
		
		$con_id = new Input ( 'CON_ID' );
		$con_id->setRequired ( true );
		$con_id->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1
		) ) )->attach(new NotEmpty())
		->attach ( new Digits () );
		
		$this->add ( $con_id );
		
		/************** CAMPOS PARA TRANSFERENCIA DE SUELDOS ******************/
		
		
		$tra_sue_valor_debito = new Input ( 'TRA_SUE_VALOR_DEBITO' );
		$tra_sue_valor_debito->setRequired ( false );
		$tra_sue_valor_debito->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 15,
				'min' => 1,
		) ) )->attach( new Float());
		
		$this->add ( $tra_sue_valor_debito );
		
		
		$tra_sue_numero_creditos = new Input ( 'TRA_SUE_NUMERO_CREDITOS' );
		$tra_sue_numero_creditos->setRequired ( false );
		$tra_sue_numero_creditos->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1,
		) ) )->attach( new Float());
		
		$this->add ( $tra_sue_numero_creditos );
		
		
		$tra_sue_valor_maximo = new Input ( 'TRA_SUE_VALOR_MAXIMO' );
		$tra_sue_valor_maximo->setRequired ( false );
		$tra_sue_valor_maximo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 15,
				'min' => 1,
		) ) )->attach( new Float());
		
		$this->add ( $tra_sue_valor_maximo );
	}
}