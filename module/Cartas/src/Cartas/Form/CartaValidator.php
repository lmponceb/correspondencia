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
				'max' => 10,
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
		$epl_id_dos->setRequired ( true );
		$epl_id_dos->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1,
		) ) )
		->attach(new NotEmpty());
		
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
		
		/*
		$sucursal = new Input ( 'SUC_ID' );
		$sucursal->setRequired ( false );
		$sucursal->setAllowEmpty(true);
		$this->add ( $sucursal );
		
		
		$pais = new Input ( 'PAI_ID' );
		$pais->setRequired ( true );
		$pais->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 3,
				'min' => 1
		) ) )->attach ( new Digits () )
		->attach(new NotEmpty());
		
		$this->add ( $pais );
		
		
		$estado = new Input ( 'EST_ID' );
		$estado->setRequired ( true );
		$estado->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 3,
				'min' => 1
		) ) )->attach ( new Digits () )
		->attach(new NotEmpty());
		
		$this->add ( $estado );
		
		
		$estado = new Input ( 'CIU_ID' );
		$estado->setRequired ( true );
		$estado->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1
		) ) )->attach ( new Digits () )
		->attach(new NotEmpty());
		
		$this->add ( $estado );
		
		
		$nombre = new Input ( 'CON_NOMBRE' );
		$nombre->setRequired ( true );
		$nombre->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 35,
				'min' => 2
		) ) )->attach ( new Alnum ( array (
				'allowWhiteSpace' => true 
		) ) )->attach(new NotEmpty());
		
		$this->add ( $nombre );
		
		
		$apellido = new Input ( 'CON_APELLIDO' );
		$apellido->setRequired ( true );
		$apellido->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 35,
				'min' => 2
		) ) )->attach ( new Alnum ( array (
				'allowWhiteSpace' => true
		) ) )->attach(new NotEmpty());
		
		
		$this->add ( $apellido );
		
		
		$email = new Input ( 'CON_EMAIL' );
		$email->setRequired ( true );
		$email->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 150,
				'min' => 6
		) ) )->attach ( new EmailAddress () )
		->attach(new NotEmpty());
		
		$this->add ( $email );
		
		
		$usuario = new Input ( 'CON_USUARIO' );
		$usuario->setRequired ( true );
		$usuario->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 20,
				'min' => 1
		) ) )->attach ( new Alnum ( array (
				'allowWhiteSpace' => true
		) ) )->attach(new NotEmpty());
		
		
		$this->add ( $usuario );
		
		
		$fecha_actualizacion = new Input ( 'CON_FECHA_ACTUALIZACION' );
		$fecha_actualizacion->setRequired ( true );
		$fecha_actualizacion->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 30,
				'min' => 9
		) ) )->attach(new NotEmpty());
		
		
		$this->add ( $fecha_actualizacion );
		
		
		$con_tip_per_es = new Input ( 'CON_TIP_PER_ES' );
		$con_tip_per_es->setRequired ( true );
		$con_tip_per_es->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 30,
				'min' => 2
		) ) )->attach(new NotEmpty());
		
		
		$this->add ( $con_tip_per_es );
		
		
		$con_tip_per_en = new Input ( 'CON_TIP_PER_EN' );
		$con_tip_per_en->setRequired ( true );
		$con_tip_per_en->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 30,
				'min' => 2
		) ) )->attach(new NotEmpty());
		
		
		$this->add ( $con_tip_per_en );
		
		
		$con_descripcion_es = new Input ( 'CON_DESCRIPCION_ES' );
		$con_descripcion_es->setRequired ( true );
		$con_descripcion_es->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 30
		) ) )->attach(new NotEmpty())->attach ( new Alnum ( array (
				'allowWhiteSpace' => true
		) ) );
		
		
		$this->add ( $con_descripcion_es );
		
		
		$con_descripcion_en = new Input ( 'CON_DESCRIPCION_EN' );
		$con_descripcion_en->setRequired ( true );
		$con_descripcion_en->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 30
		) ) )->attach(new NotEmpty())->attach ( new Alnum ( array (
				'allowWhiteSpace' => true
		) ) );
		
		
		$this->add ( $con_descripcion_en );
		
		
		$con_direccion = new Input ( 'CON_DIRECCION' );
		$con_direccion->setRequired ( true );
		$con_direccion->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 150
		) ) )->attach(new NotEmpty());
		
		
		$this->add ( $con_direccion );
		
		
		$con_estado = new Input ( 'CON_ESTADO' );
		$con_estado->setRequired ( true );
		$con_estado->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 1,
				'min' => 1
		) ) )->attach(new Alnum(array(
				'allowWhiteSpace' => false,
		)))->attach(new NotEmpty())
		->attach(new InArray(array(
				'haystack' => array('A','I'),
		)));
		
		$this->add ( $con_estado );
		
				*/
	}
}