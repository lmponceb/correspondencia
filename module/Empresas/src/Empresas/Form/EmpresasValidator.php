<?php

namespace Empresas\Form;

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
/*  Class EmpresasValidator
 *  Form PHP side validators definition class
*/

class EmpresasValidator extends InputFilter {
	public function __construct($name = null, $max_detalle_contacto=0) {
		
		$this->add ( array (
				'name' => 'EMP_NOMBRE',
				'required' => true 
		) );

		$this->add ( array (
				'name' => 'CAT_EMP_ID',
				'required' => false 
		) );

		$this->add ( array (
				'name' => 'EMP_DIRECCION',
				'required' => true 
		) );		

		for($i=0;$i<$max_detalle_contacto;$i++){
			$this->add ( array (
				'name' => 'DETALLE_CONTACTO['.$i.'][TIP_TEL_ID]',
				'required' => false 
			) );

			$this->add ( array (
				'name' => 'DETALLE_CONTACTO['.$i.'][DET_CON_CODIGO_PAIS]',
				'required' => false 
			) );

			$this->add ( array (
				'name' => 'DETALLE_CONTACTO['.$i.'][DET_CON_CODIGO_CIUDAD]',
				'required' => false 
			) );

		}

	}
}