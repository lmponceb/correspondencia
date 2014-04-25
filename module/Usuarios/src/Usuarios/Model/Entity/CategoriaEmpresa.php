<?php
namespace Usuarios\Model\Entity;

class CategoriaEmpresa {
	
	private $cat_emp_id;
	private $cat_emp_descripcion;
	
	function __construct() {}
	
	/**
	 * @return the $cat_emp_id
	 */
	public function getCat_emp_id() {
		return $this->cat_emp_id;
	}

	/**
	 * @return the $cat_emp_descripcion
	 */
	public function getCat_emp_descripcion() {
		return $this->cat_emp_descripcion;
	}

	/**
	 * @param Ambigous <NULL, unknown> $cat_emp_id
	 */
	public function setCat_emp_id($cat_emp_id) {
		$this->cat_emp_id = $cat_emp_id;
	}

	/**
	 * @param Ambigous <NULL, unknown> $cat_emp_descripcion
	 */
	public function setCat_emp_descripcion($cat_emp_descripcion) {
		$this->cat_emp_descripcion = $cat_emp_descripcion;
	}

	public function exchangeArray($data)
	{
		$this->cat_emp_id = (isset($data['CAT_EMP_ID'])) ? $data['CAT_EMP_ID'] : null;
		$this->cat_emp_descripcion = (isset($data['CAT_EMP_DESCRIPCION'])) ? $data['CAT_EMP_DESCRIPCION'] : null;
	}
	
	public function getArrayCopy(){
		return array_change_key_case(get_object_vars($this), CASE_UPPER);
	}
}
