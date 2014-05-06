<?php

namespace Contactos\Form;


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


class ContactoValidator extends InputFilter {
	function __construct() {
		
		$idioma = new Input ( 'CON_IDIOMA' );
		$idioma->setRequired ( false );
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
		
		
		$cargo = new Input ( 'CAR_ID' );
		$cargo->setRequired ( true );
		$cargo->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 6,
				'min' => 1 
		) ) )->attach ( new Digits () )
		->attach(new NotEmpty());
		
		$this->add ( $cargo );
		
		
		$empresa = new Input ( 'EMP_ID' );
		$empresa->setRequired ( true );
		$empresa->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 11,
				'min' => 1
		) ) )->attach ( new Digits () )
		->attach(new NotEmpty());
		
		$this->add ( $empresa );
		
		
		$sucursal = new Input ( 'SUC_ID' );
		$sucursal->setRequired ( false );
		$sucursal->setAllowEmpty(true);
		$this->add ( $sucursal );
		
		
		$tipo_persona = new Input ( 'TIP_PER_ID' );
		$tipo_persona->setRequired ( true );
		$tipo_persona->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 3,
				'min' => 1
		) ) )->attach ( new Digits () )
		->attach(new NotEmpty());
		
		$this->add ( $tipo_persona );
		
		
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
		
		
		
		/***************** DATOS PARA USUARIOS ADMINISTRATIVOS ************************/
		
		
		$privado = new Input ( 'CON_PRIVADO' );
		$privado->setRequired ( false );
		$privado->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 1,
				'min' => 1
		) ) )->attach(new Alnum(array(
				'allowWhiteSpace' => false,
		)))->attach(new NotEmpty())
		->attach(new InArray(array(
				'haystack' => array('S','N'),
		)));
		
		$this->add ( $privado );
		
		
		$email_personal = new Input ( 'CON_EMAIL_PERSONAL' );
		$email_personal->setRequired ( false );
		$email_personal->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 150,
				'min' => 6
		) ) )->attach ( new EmailAddress () );
		
		$this->add ( $email_personal );
		
		
		$fecha_nacimiento = new Input ( 'CON_FECHA_NACIMIENTO_PERSONAL' );
		$fecha_nacimiento->setRequired ( false );
		$fecha_nacimiento->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 30,
				'min' => 9
		) ) );
		
		$this->add ( $fecha_nacimiento );
		
		
		$codigo_pais = new Input ( 'CON_CODIGO_PAIS' );
		$codigo_pais->setRequired ( false );
		$codigo_pais->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 5,
				'min' => 1
		) ) )->attach ( new Digits() );
		
		$this->add ( $codigo_pais );
		
		
		$codigo_ciudad = new Input ( 'CON_CODIGO_CIUDAD' );
		$codigo_ciudad->setRequired ( false );
		$codigo_ciudad->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 5,
				'min' => 1
		) ) )->attach ( new Digits() );
		
		$this->add ( $codigo_ciudad );
		
		
		$telefono_domicilio = new Input ( 'CON_TELEFONO_DOMICILIO_PER' );
		$telefono_domicilio->setRequired ( false );
		$telefono_domicilio->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 15,
				'min' => 6
		) ) )->attach ( new Digits() );
		
		$this->add ( $telefono_domicilio );
		
		
		$celular_personal = new Input ( 'CON_CELULAR_PERSONAL' );
		$celular_personal->setRequired ( false );
		$celular_personal->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 15,
				'min' => 8
		) ) )->attach ( new Digits() );
		
		$this->add ( $celular_personal );
		
		
		$observaciones = new Input ( 'CON_OBSERVACIONES' );
		$observaciones->setRequired ( false );
		$observaciones->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 4000
		) ) );
		
		$this->add ( $observaciones );
		
		for ($indice_contacto_relacionado=0; $indice_contacto_relacionado<5; $indice_contacto_relacionado++){
			
			$tip_con_id = new Input ( 'CONTACTO_RELACIONADO['.$indice_contacto_relacionado.'][TIP_CON_ID]' );
			$tip_con_id->setRequired ( false );
			$tip_con_id->getValidatorChain ()->attach ( new Digits () );
			$this->add ( $tip_con_id );
		}
		
		for ($indice_detalle_contacto=0; $indice_detalle_contacto<5; $indice_detalle_contacto++){
				
			$tip_tel_id = new Input ( 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][TIP_TEL_ID]' );
			$tip_tel_id->setRequired ( false );
			$tip_tel_id->getValidatorChain ()->attach ( new Digits () );
			$this->add ( $tip_tel_id );
			
			$det_con_codigo_pais = new Input ( 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_PAIS]' );
			$det_con_codigo_pais->setRequired ( false );
			$det_con_codigo_pais->getValidatorChain ()->attach ( new Digits () );
			$this->add ( $det_con_codigo_pais );
			
			$det_con_codigo_ciudad = new Input ( 'DETALLE_CONTACTO['.$indice_detalle_contacto.'][DET_CON_CODIGO_CIUDAD]' );
			$det_con_codigo_ciudad->setRequired ( false );
			$det_con_codigo_ciudad->getValidatorChain ()->attach ( new Digits () );
			$this->add ( $det_con_codigo_ciudad );
		}
		
		/* 
		
		$telefono = new Input ( 'pac_telefono' );
		$telefono->setRequired ( true );
		$telefono->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 13,
				'min' => 7 
		) ) )->attach ( new Digits () );
		
		$this->add ( $telefono );
		
		$celular = new Input ( 'pac_celular' );
		$celular->setRequired ( true );
		$celular->getValidatorChain ()->attach ( new StringLength ( array (
				'max' => 13,
				'min' => 10 
		) ) )->attach ( new Digits () );
		
		$this->add ( $celular );
		
		*/
		
				
	}
}

?>