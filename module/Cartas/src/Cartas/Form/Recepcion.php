<?php

namespace Cartas\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;
use Zend\Form\Element\Checkbox;

date_default_timezone_set('America/Guayaquil');

class Recepcion extends Form {
	function __construct($name = null) {
		
		parent::__construct($name);
		
		/* ********************************************
		 * CAMPO CODIGO PRIMARIO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_ID',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'FE_REC_ID',
						'class' => 'form-control'
				)
		) );
		
		
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
						'value' => $_SESSION['Zend_Auth']['storage']->us_codigo
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
		 * CAMPO TIPO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_TIPO',
				'options' => array (
						'label' => 'Tipo*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '50',
						'id' => 'FE_REC_TIPO',
						'value' => 'Bid Submittal Form',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO IDIOMA
		 * ********************************************/
		$fe_rec_idioma = new Select('FE_REC_IDIOMA');
		$fe_rec_idioma->setLabel('Idioma*: ');
		$fe_rec_idioma->setAttributes(array('class' => 'form-control'));
		$fe_rec_idioma->setAttributes(array('id' => 'FE_REC_IDIOMA'));
		$fe_rec_idioma->setEmptyOption('-- Seleccione --');
		$fe_rec_idioma->setValueOptions(array(
				'E' => 'Espa&ntilde;ol',
				'I' => 'Ingl&eacute;s',
		));
		$fe_rec_idioma->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($fe_rec_idioma);
		
		
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
		 * CAMPO RESPONSABLE
		* ********************************************/
		
		/* $this->add ( array (
				'name' => 'FE_REC_RESPONSABLE',
				'options' => array (
						'label' => 'Responsable*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '70',
						'id' => 'FE_REC_RESPONSABLE',
						'class' => 'form-control'
				)
		) ); */
		
		
		/* ********************************************
		 * CAMPO DESCRIPCION
		* ********************************************/
		
		/* $this->add ( array (
				'name' => 'FE_REC_DESCRIPCION',
				'options' => array (
						'label' => 'Descripci&oacute;n*:'
				),
				'attributes' => array (
						'type' => 'textarea',
						'maxlenght' => '200',
						'id' => 'FE_REC_DESCRIPCION',
						'class' => 'form-control'
				)
		) );
		 */
		
		/* ********************************************
		 * CAMPO COMPANIA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_COMPANIA',
				'options' => array (
						'label' => 'Empresa*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '150',
						'id' => 'FE_REC_COMPANIA',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO OFERENTE
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_OFERENTE',
				'options' => array (
						'label' => 'Oferente*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '75',
						'readonly' => 'readonly',
						//'value' => 'AZULEC',
						'id' => 'FE_REC_OFERENTE',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO OFERTA NOMBRE
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_OFERTA_NOMBRE',
				'options' => array (
						'label' => 'Nombre de la oferta*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '75',
						'id' => 'FE_REC_OFERTA_NOMBRE',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO OFERTA CODIGO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_OFERTA_CODIGO',
				'options' => array (
						'label' => 'C&oacute;digo de la Oferta:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						//'readonly' => 'readonly',
						'id' => 'FE_REC_OFERTA_CODIGO',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO FECHA
		* ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_FECHA',
				'options' => array (
						'label' => ''
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '15',
						//'readonly' => 'readonly',
						'id' => 'FE_REC_FECHA',
						'class' => 'form-control fecha_nacimiento'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO HORA
		 * ********************************************/
		$hora = new Select('FE_REC_FECHA_HORA');
		$hora->setLabel('HH*: ');
		$hora->setAttributes(array('class' => 'form-control'));
		$hora->setAttributes(array('id' => 'FE_REC_FECHA_HORA'));
		$hora->setEmptyOption('-- Seleccione --');
		$hora->setValueOptions(array(
				'01' => '01',
				'02' => '02',
				'03' => '03',
				'04' => '04',
				'05' => '05',
				'06' => '06',
				'08' => '08',
				'09' => '09',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
		));
		$hora->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($hora);
		
		/* ********************************************
		 * CAMPO MINUTOS
		* ********************************************/
		$minuto = new Select('FE_REC_FECHA_MINUTO');
		$minuto->setLabel('MM*: ');
		$minuto->setAttributes(array('class' => 'form-control'));
		$minuto->setAttributes(array('id' => 'FE_REC_FECHA_MINUTO'));
		$minuto->setEmptyOption('-- Seleccione --');
		$minuto->setValueOptions(array(
				'00' => '00',
				'01' => '01',
				'02' => '02',
				'03' => '03',
				'04' => '04',
				'05' => '05',
				'06' => '06',
				'08' => '08',
				'09' => '09',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',
				'32' => '32',
				'33' => '33',
				'34' => '34',
				'35' => '35',
				'36' => '36',
				'37' => '37',
				'38' => '38',
				'39' => '39',
				'40' => '40',
				'41' => '41',
				'42' => '42',
				'43' => '43',
				'44' => '44',
				'45' => '45',
				'46' => '46',
				'47' => '47',
				'48' => '48',
				'49' => '49',
				'50' => '50',
				'51' => '51',
				'52' => '52',
				'53' => '53',
				'54' => '54',
				'55' => '55',
				'56' => '56',
				'57' => '57',
				'58' => '58',
				'59' => '59',
		));
		$minuto->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($minuto);
		
		
		/* ********************************************
		 * CAMPO ANIO
		* ********************************************/
		/* $anio = new Select('FE_REC_FECHA_ANIO');
		$anio->setLabel('A&ntilde;o*: ');
		$anio->setAttributes(array('class' => 'form-control'));
		$anio->setAttributes(array('id' => 'FE_REC_FECHA_ANIO'));
		$anio->setEmptyOption('-- Seleccione --');
		$anio->setValueOptions(array(
				'2014' => '2014',
				'2015' => '2015',
				'2016' => '2016',
				'2017' => '2017',
				'2018' => '2018',
				'2019' => '2019',
				'2020' => '2020',
				'2021' => '2021',
				'2022' => '2022',
				'2023' => '2023',
				'2024' => '2024',
				'2025' => '2025',
				'2026' => '2026',
				'2027' => '2027',
				'2028' => '2028',
				'2029' => '2029',
				'2030' => '2030',
		));
		$anio->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($anio); */
		
		
		/* ********************************************
		 * CAMPO MES
		* ********************************************/
	/* 	$mes = new Select('FE_REC_FECHA_MES');
		$mes->setLabel('Mes*: ');
		$mes->setAttributes(array('class' => 'form-control'));
		$mes->setAttributes(array('id' => 'FE_REC_FECHA_MES'));
		$mes->setEmptyOption('-- Seleccione --');
		$mes->setValueOptions(array(
				'01' => 'Enero',
				'02' => 'Febrero',
				'03' => 'Marzo',
				'04' => 'Abril',
				'05' => 'Mayo',
				'06' => 'Junio',
				'07' => 'Julio',
				'08' => 'Agosto',
				'09' => 'Septiembre',
				'10' => 'Octubre',
				'11' => 'Noviembre',
				'12' => 'Diciembre',
		));
		$mes->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($mes); */
		
		
		/* ********************************************
		 * CAMPO DIA
		* ********************************************/
		/* $dia = new Select('FE_REC_FECHA_DIA');
		$dia->setLabel('D&iacute;a*: ');
		$dia->setAttributes(array('class' => 'form-control'));
		$dia->setAttributes(array('id' => 'FE_REC_FECHA_DIA'));
		$dia->setEmptyOption('-- Seleccione --');
		$dia->setValueOptions(array(
				'01' => '01',
				'02' => '02',
				'03' => '03',
				'04' => '04',
				'05' => '05',
				'06' => '06',
				'08' => '08',
				'09' => '09',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',
		));
		$dia->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($dia); */
		
		
		/* ********************************************
		 * CAMPO SOBRE
		* ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_SOBRE',
				'options' => array (
						'label' => 'Sobre*:'
				),
				'attributes' => array (
						'type' => 'textarea',
						'maxlenght' => '200',
						'id' => 'FE_REC_SOBRE',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO ESTADO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'FE_REC_ESTADO',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '1',
						'value' => 'B',
						'id' => 'FE_REC_ESTADO',
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
						'onclick' => 'habilitar(1)',
						'data-loading-text' => 'Loading...'
				)
		) );
		
		//BOTON DE VISTA PRELIMINAR
		$this->add ( array (
				'name' => 'vista',
				'attributes' => array (
						'type' => 'submit',
						'value' => 'Vista Preliminar',
						'onclick' => 'habilitar(2)',
						'class' => 'btn btn-primary',
						'data-loading-text' => 'Loading...'
				)
		) );
		
	}
}