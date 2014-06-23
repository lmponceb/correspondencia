<?php
namespace Cartas\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;
use Zend\Form\Element\Checkbox;

date_default_timezone_set('America/Guayaquil');

class Carta extends Form {
	function __construct($name = null) {
		
		parent::__construct($name);
		
		/* ********************************************
		 * CAMPO CODIGO PRIMARIO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_ID',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'CTR_ID',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO ACTIVAR DIRECCION
		 * ********************************************/
		
		$ctr_activar_direccion = new Select('CTR_ACTIVAR_DIRECCION');
		$ctr_activar_direccion->setLabel('&iquest;Mostrar direcci&oacute;n?*: ');
		$ctr_activar_direccion->setAttributes(array('class' => 'form-control'));
		$ctr_activar_direccion->setAttributes(array('id' => 'CTR_ACTIVAR_DIRECCION'));
		$ctr_activar_direccion->setEmptyOption('-- Seleccione --');
		$ctr_activar_direccion->setValueOptions(array(
				'E' => 'S&iacute; - Mostrar direcci&oacute;n de la empresa',
				'C' => 'S&iacute; - Mostrar direcci&oacute;n del contacto',
				'N' => 'No mostrar direcci&oacute;n',
		));
		$ctr_activar_direccion->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($ctr_activar_direccion);
		
		
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
		 * CAMPO TIPO DE CARTA
		 * ********************************************/
		$tip_car_id = new Select('TIP_CAR_ID');
		$tip_car_id->setLabel('Tipo de Carta*: ');
		$tip_car_id->setAttributes(array('class' => 'form-control'));
		$tip_car_id->setAttributes(array('id' => 'TIP_CAR_ID'));
		$tip_car_id->setEmptyOption('-- Seleccione --');
		$tip_car_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($tip_car_id);
		
		
		/* ********************************************
		 * CAMPO PROYECTO
		 * ********************************************/
		$pro_id = new Select('PRO_ID');
		$pro_id->setLabel('Proyecto*: ');
		$pro_id->setAttributes(array('class' => 'form-control'));
		$pro_id->setAttributes(array('id' => 'PRO_ID'));
		$pro_id->setEmptyOption('-- Seleccione --');
		$pro_id->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($pro_id);
		
		
		/* ********************************************
		 * CAMPO PROYECTO OCULTO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'proyecto_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'proyecto_oculto',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO IDIOMA
		 * ********************************************/
		$ctr_idioma = new Select('CTR_IDIOMA');
		$ctr_idioma->setLabel('Idioma*: ');
		$ctr_idioma->setAttributes(array('class' => 'form-control'));
		$ctr_idioma->setAttributes(array('id' => 'CTR_IDIOMA'));
		$ctr_idioma->setEmptyOption('-- Seleccione --');
		$ctr_idioma->setValueOptions(array(
				'E' => 'Espa&ntilde;ol',
				'I' => 'Ingl&eacute;s',
		));
		$ctr_idioma->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($ctr_idioma);
		
		
		/* ********************************************
		 * CAMPO USUARIO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'US_CODIGO',
				'attributes' => array (
						'type' => 'hidden',
						'value' => $_SESSION['Zend_Auth']['storage']->US_CODIGO,
						'maxlenght' => '20',
						'id' => 'US_CODIGO',
						'class' => 'form-control',
						
				)
		) );
		
		
		/* ********************************************
		 * CAMPO FECHA DE CREACION
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_FECHA_CREACION',
				'options' => array (
						'label' => 'Fecha*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '10',
						'id' => 'CTR_FECHA_CREACION',
						'class' => 'form-control fecha_nacimiento',
						'value' => date('d-M-Y')
				)
		) );
		
		/* ********************************************
		 * CAMPO CUERPO DE LA CARTA
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_CUERPO',
				'options' => array (
						'label' => 'Cuerpo*:'
				),
				'attributes' => array (
						'type' => 'textarea',
						//'cols' => '100',
						'rows' => '15',
						'id' => 'CTR_CUERPO',
						'class' => 'ckeditor'
						//form-control
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CODIGO FINAL
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_CODIGO_FINAL',
				'options' => array (
						'label' => 'N&uacute;mero de carta*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '50',
						'readonly' => 'readonly', 
						'id' => 'CTR_CODIGO_FINAL',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO FECHA DE ACTUALIZACION
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_FECHA_ACTUALIZACION',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '10',
						'readonly' => 'readonly',
						'id' => 'CTR_FECHA_ACTUALIZACION',
						'class' => 'form-control',
				)
		) );
		
		/* ********************************************
		 * CAMPO REFERENCIA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_REFERENCIA',
				'options' => array (
						'label' => 'Referencia:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '300',
						'id' => 'CTR_REFERENCIA',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO SALUDO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_SALUDO',
				'options' => array (
						'label' => 'Saludo*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						'id' => 'CTR_SALUDO',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO DESPEDIDA
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_DESPEDIDA',
				'options' => array (
						'label' => 'Despedida*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						'id' => 'CTR_DESPEDIDA',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO TIPO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_TIPO',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '1',
						'value' => 'B',
						'id' => 'CTR_TIPO',
						'class' => 'form-control'
				)
		) );
		
		/* ********************************************
		 * CAMPO ESTADO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_ESTADO',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '1',
						'value' => 'A',
						'id' => 'CTR_ESTADO',
						'class' => 'form-control'
				)
		) );
		
	
		
		/************ CAMPOS OTRAS TABLAS *************/
		
		
		/* ********************************************
		 * CAMPO FIRMA 1
		 * ********************************************/
// 		$epl_id_uno = new Select('EPL_ID_UNO');
// 		$epl_id_uno->setLabel('Firma 1*: ');
// 		$epl_id_uno->setAttributes(array('class' => 'form-control'));
// 		$epl_id_uno->setAttributes(array('id' => 'EPL_ID_UNO'));
// 		$epl_id_uno->setEmptyOption('-- Seleccione --');
// 		$epl_id_uno->setOptions(array(
// 				'disable_inarray_validator' => false, // <-- disable
// 		));
// 		$this->add($epl_id_uno);
		
		
		$this->add ( array (
				'name' => 'EPL_ID_UNO',
				'options' => array (
						'label' => 'Firma 1*:'
				),
				'attributes' => array (
						'type' => 'text',
						'id' => 'EPL_ID_UNO',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CARGO 1
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'CARGO_UNO',
				'options' => array (
						'label' => 'Cargo Firma 1*:'
				),
				'attributes' => array (
						'type' => 'text',
						'id' => 'CARGO_UNO',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO FIRMA 2
		 * ********************************************/
// 		$epl_id_dos = new Select('EPL_ID_DOS');
// 		$epl_id_dos->setLabel('Firma 2: ');
// 		$epl_id_dos->setAttributes(array('class' => 'form-control'));
// 		$epl_id_dos->setAttributes(array('id' => 'EPL_ID_DOS'));
// 		$epl_id_dos->setEmptyOption('-- Seleccione --');
// 		$epl_id_dos->setOptions(array(
// 				'disable_inarray_validator' => false, // <-- disable
// 		));
// 		$this->add($epl_id_dos);
		
		
		$this->add ( array (
				'name' => 'EPL_ID_DOS',
				'options' => array (
						'label' => 'Firma 2:'
				),
				'attributes' => array (
						'type' => 'text',
						'id' => 'EPL_ID_DOS',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CARGO 2
		 * ********************************************/
		$this->add ( array (
				'name' => 'CARGO_DOS',
				'options' => array (
						'label' => 'Cargo Firma 2:'
				),
				'attributes' => array (
						'type' => 'text',
						'id' => 'CARGO_DOS',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO PRINCIPAL
		 * ********************************************/
		/* $this->add ( array (
				'name' => 'CAR_FIR_TIPO',
				'options' => array (
						'label' => '&iquest;Es principal?:'
				),
				'attributes' => array (
						'type' => 'checkbox',
						'id' => 'CAR_FIR_TIPO',
						'value' => 'P',
						'class' => 'form-control'
				)
		) ); */
		
		$checkbox = new Checkbox('CAR_FIR_TIPO');
		$checkbox->setLabel('&iquest;Es principal?: &nbsp;');
		$checkbox->setAttribute('checked', 'checked');
		$checkbox->setUseHiddenElement(true);
		$checkbox->setCheckedValue("P");
		$checkbox->setUncheckedValue("S");
		
		//$form = new Form('my-form');
		$this->add($checkbox);
		
		/* ********************************************
		 * CAMPO EMPRESA
		 * ********************************************/
		$empresa = new Select('EMP_ID');
		$empresa->setLabel('Empresa*: ');
		$empresa->setAttributes(array('id' => 'EMP_ID'));
		$empresa->setAttributes(array('class' => 'form-control'));
		$empresa->setEmptyOption('-- Seleccione --');
		//$pais->setValue('1');
		$empresa->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($empresa);
		
		/* ********************************************
		 * CAMPO SUCURSAL
		 * ********************************************/
		$sucursal = new Select('SUC_ID');
		$sucursal->setLabel('Sucursal: ');
		$sucursal->setAttributes(array('id' => 'SUC_ID'));
		$sucursal->setAttributes(array('disabled' => 'disabled'));
		$sucursal->setAttributes(array('class' => 'form-control'));
		$sucursal->setEmptyOption('-- Seleccione --');
		//$pais->setValue('1');
		$sucursal->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($sucursal);
		
		/* ********************************************
		 * CAMPO SUCURSAL OCULTO
		 * ********************************************/
		
		$this->add ( array (
				'name' => 'sucursal_oculto',
				
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'sucursal_oculto',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO EMPRESA OCULTO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'empresa_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'empresa_oculto',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CONTACTO
		 * ********************************************/
		$con_id = new Select('CON_ID');
		$con_id->setLabel('Destinatario*: ');
		$con_id->setAttributes(array('class' => 'form-control'));
		$con_id->setAttributes(array('id' => 'CON_ID'));
		$con_id->setAttributes(array('disabled' => 'disabled'));
		$con_id->setEmptyOption('-- Seleccione --');
		$con_id->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($con_id);
		
		/* ********************************************
		 * CAMPO CONTACTO OCULTO
		* ********************************************/
		
		$this->add ( array (
				'name' => 'contacto_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'contacto_oculto',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO COPIA
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_COPIA',
				'options' => array (
						'label' => 'CC:'
				),
				'attributes' => array (
						'type' => 'textarea',
						'rows' => '2',
						'maxlenght' => '300',
						'id' => 'CTR_COPIA',
						'class' => 'ckeditor'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO ANEXOS
		* ********************************************/
		
		$this->add ( array (
				'name' => 'CTR_ANEXOS',
				'options' => array (
						'label' => 'Anexos:'
				),
				'attributes' => array (
						'type' => 'textarea',
						'rows' => '2',
						'maxlenght' => '4000',
						'id' => 'CTR_ANEXOS',
						'class' => 'ckeditor'
				)
		) );
		
		
		/************** CAMPOS PARA TRANSFERENCIA DE SUELDOS ******************/
		
		$this->add ( array (
				'name' => 'TRA_SUE_VALOR_DEBITO',
				'options' => array (
						'label' => 'Valor del D&eacute;bito*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '14',
						'id' => 'TRA_SUE_VALOR_DEBITO',
						'class' => 'form-control'
				)
		) );
		
		
		$this->add ( array (
				'name' => 'TRA_SUE_NUMERO_CREDITOS',
				'options' => array (
						'label' => 'N&uacute;mero de Cr&eacute;ditos*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '11',
						'id' => 'TRA_SUE_NUMERO_CREDITOS',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_SUE_VALOR_MAXIMO',
				'options' => array (
						'label' => 'Valor M&aacute;ximo de Cr&eacute;dito*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '14',
						'id' => 'TRA_SUE_VALOR_MAXIMO',
						'class' => 'form-control'
				)
		) );
		
		
		/* ********************************************
		 * CAMPO CONTACT PRIVADO
		* ********************************************/
		
		$ctr_privada = new Select('CTR_PRIVADA');
		$ctr_privada->setLabel('&iquest; Es carta privada?: ');
		$ctr_privada->setAttributes(array('class' => 'form-control'));
		$ctr_privada->setValue('N');
		$ctr_privada->setValueOptions(array(
				'S' => 'S&iacute;',
				'N' => 'No',
		)
		);
		
		$this->add($ctr_privada);
		
		
		/************** CAMPOS PARA TRANSACCION BANCARIA ******************/
		
		$this->add ( array (
				'name' => 'TRA_BAN_BENEFICIARIO',
				'options' => array (
						'label' => 'Beneficiario*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '70',
						'id' => 'TRA_BAN_BENEFICIARIO',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_BAN_DIRECCION',
				'options' => array (
						'label' => 'Direcci&oacute;n Beneficiario*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '150',
						'id' => 'TRA_BAN_DIRECCION',
						'class' => 'form-control'
				)
		) );
		
		
		$this->add ( array (
				'name' => 'TRA_BAN_CUENTA',
				'options' => array (
						'label' => 'Cuenta No.*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '25',
						'id' => 'TRA_BAN_CUENTA',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_BAN_VALOR',
				'options' => array (
						'label' => 'Valor*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '15',
						'id' => 'TRA_BAN_VALOR',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_BAN_ABA',
				'options' => array (
						'label' => 'ABA No.*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						'id' => 'TRA_BAN_ABA',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_BAN_BANCO',
				'options' => array (
						'label' => 'Nombre del banco*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						'id' => 'TRA_BAN_BANCO',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_BAN_BANCO_LINEA_DOS',
				'options' => array (
						'label' => 'Informaci&oacute;n Adicional'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '100',
						'id' => 'TRA_BAN_BANCO_LINEA_DOS',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_BAN_BANCO_DIRECCION',
				'options' => array (
						'label' => 'Direcci&oacute;n del banco*:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '150',
						'id' => 'TRA_BAN_BANCO_DIRECCION',
						'class' => 'form-control'
				)
		) );
		
		
		$this->add ( array (
				'name' => 'TRA_BAN_CC',
				'options' => array (
						'label' => 'CC:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '75',
						'id' => 'TRA_BAN_CC',
						'class' => 'form-control'
				)
		) );
		
		$this->add ( array (
				'name' => 'TRA_BAN_COD_SERIE',
				'options' => array (
						'label' => 'Cod:'
				),
				'attributes' => array (
						'type' => 'text',
						'maxlenght' => '30',
						'id' => 'TRA_BAN_COD_SERIE',
						'class' => 'form-control'
				)
		) );
		
		
		$tra_ban_detalle = new Select('TRA_BAN_DETALLE');
		$tra_ban_detalle->setLabel('&iquest;Mostrar detalle?*: ');
		$tra_ban_detalle->setAttributes(array('class' => 'form-control'));
		$tra_ban_detalle->setAttributes(array('id' => 'TRA_BAN_DETALLE'));
		$tra_ban_detalle->setValueOptions(array(
				'S' => 'S&iacute;',
				'N' => 'No',
		));
		$tra_ban_detalle->setOptions(array(
				'disable_inarray_validator' => false, // <-- disable
		));
		$this->add($tra_ban_detalle);
		
		/************** DIRECCION ADICIONAL SUCURSAL **************/
		
		/* ********************************************
		 * CAMPO ADICIONAL DIRECCION EMPRESA 
		* ********************************************/
		$ctr_direccion_empresa = new Select('CTR_DIRECCION_EMPRESA');
		$ctr_direccion_empresa->setLabel('Direcci&oacute;n a mostrar: ');
		$ctr_direccion_empresa->setAttributes(array('id' => 'CTR_DIRECCION_EMPRESA'));
		$ctr_direccion_empresa->setAttributes(array('class' => 'form-control'));
		$ctr_direccion_empresa->setEmptyOption('-- Seleccione --');
		//$pais->setValue('1');
		$ctr_direccion_empresa->setOptions(array(
				'disable_inarray_validator' => true, // <-- disable
		));
		$this->add($ctr_direccion_empresa);
		
		
		$this->add ( array (
				'name' => 'direccion_empresa_oculto',
				'attributes' => array (
						'type' => 'hidden',
						'maxlenght' => '11',
						'id' => 'direccion_empresa_oculto',
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
						'target' => 'blank',
						'onclick' => 'habilitar(2)',
						'class' => 'btn btn-primary',
						'data-loading-text' => 'Loading...'
				)
		) );
		
	}
}