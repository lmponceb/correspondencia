<?php

namespace Empresas\Form;

use Zend\InputFilter\InputFilter;

/*  Class EmpresasValidator
 *  Form PHP side validators definition class
*/

class EmpresasValidator extends InputFilter {
	public function __construct($name = null) {
		$this->add ( array (
				'name' => 'emp_id',
				'required' => false,
				'filters' => array (
						array (
								'name' => 'Int' 
						) 
				) 
		) );
		
		$this->add ( array (
				'name' => 'emp_nombre',
				'required' => true 
		) );

		$this->add ( array (
			'name' => 'cat_emp_id',
			'required' => true 
		) );
	}
}