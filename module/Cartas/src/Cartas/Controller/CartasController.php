<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cartas\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cartas\Form\Carta;
use Cartas\Model\Entity\Carta as CartaEntity;
use Cartas\Model\Entity\CartaDestinatario;
use Cartas\Model\Entity\CartaFirma;
use DOMPDFModule\View\Model\PdfModel;
use Cartas\Form\CartaValidator;
use Cartas\Model\Entity\TransferenciaSueldo;
use Cartas\Model\Entity\TransaccionBancaria;

date_default_timezone_set('America/Guayaquil');

class CartasController extends AbstractActionController
{
	protected $cartaDao;
	protected $tipoCartaDao;
	protected $empresaInternaDao;
	protected $empresaDao;
	protected $empleadoDao;
	protected $proyectoDao;
	protected $contactoDao;
	protected $obraDao;
	protected $cartaDestinatarioDao;
	protected $cartaFirmaDao;
	protected $tipo_usuario;
	protected $privado;
	protected $transferenciaSueldoDao;
	protected $transaccionBancariaDao;
	
    public function listadoAction()
    {
        $cartas = $this->getCartaDao ()->traerTodos ();
		
		return new ViewModel ( array (
				'cartas' => $cartas,
		) );
    }
    
    public function ingresarAction(){

   		$form = $this->getForm ();
    	
    	//FORMULARIO DE INGRESO DE INFORMACION
    	return new ViewModel ( array (
    			'formulario' => $form ,
    			'tipo_usuario' => $this->tipo_usuario,
    			'privado' => $this->privado,
    			'action' => $this->params()->fromRoute('action')
    	) );
    }
    
    public function editarAction(){
    	 
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );

    	$form = $this->getForm ();
    	
    	//FORMULARIO DE ACTUALIZACION DE INFORMACION
    	$carta = $this->getCartaDao ()->traer ( $id );
    	
    	$form->bind ( $carta );
    		
    	$form->get ( 'PRO_ID' )->setAttribute ( 'value', $carta->getPro_id());
    	
    	$form->get ( 'proyecto_oculto' )->setAttribute('value', $carta->getPro_id());
    	$form->get ( 'ingresar' )->setAttribute ( 'value', 'Actualizar' );
    	$form->get ( 'CTR_ID' )->setAttribute ( 'value', $carta->getCtr_id() );
    	
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($carta->getCtr_id());
    	
    	$form->get('contacto_oculto')->setAttribute('value', $carta_destinatario->getCon_id());
    	$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	$emp_emp_id = $empresa->getEmp_emp_id();
    	
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    		
    		$form->get('empresa_oculto')->setAttribute('value', $empresa_padre->getEmp_id());
    		$form->get('EMP_ID')->setAttribute('value', $empresa_padre->getEmp_id());
    		$form->get('sucursal_oculto')->setAttribute('value', $empresa->getEmp_id());
    		$form->get('SUC_ID')->setAttribute('value', $empresa->getEmp_id());
    		
    	}else{
    		$form->get('empresa_oculto')->setAttribute('value', $empresa->getEmp_id());
    		$form->get('EMP_ID')->setAttribute('value', $empresa->getEmp_id());
    	}
    	
    	
    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCarta($carta->getCtr_id());
    	
    	$array = array();
    	$i=0;
    	foreach ($carta_firma as $car){
    		$array[$i]['CAR_FIR_NOMBRE'] = $car->getCar_fir_nombre();
    		$array[$i]['CAR_FIR_TIPO'] = $car->getCar_fir_tipo();
    		$array[$i]['CAR_FIR_CARGO'] = $car->getCar_fir_cargo();
    		$i++;
    	}
    	
    	$form->get('EPL_ID_UNO')->setAttribute('value', $array[0]['CAR_FIR_NOMBRE']);
    	$form->get('CARGO_UNO')->setAttribute('value', $array[0]['CAR_FIR_CARGO']);
    	$form->get('CAR_FIR_TIPO')->setAttribute('checked', 'checked');
    	$form->get('EPL_ID_DOS')->setAttribute('value', $array[1]['CAR_FIR_NOMBRE']);
    	$form->get('CARGO_DOS')->setAttribute('value', $array[0]['CAR_FIR_CARGO']);
    	
    	$tipo_carta = $carta->getTip_car_id();
    	
    	if($tipo_carta == 5){
    		$transferencia = $this->getTransferenciaSueldoDao()->traerTodosPorCarta($id);
    		$form->get('TRA_SUE_VALOR_DEBITO')->setAttribute('value', $transferencia->getTra_sue_valor_debito());
    		$form->get('TRA_SUE_NUMERO_CREDITOS')->setAttribute('value', $transferencia->getTra_sue_numero_creditos());
    		$form->get('TRA_SUE_VALOR_MAXIMO')->setAttribute('value', $transferencia->getTra_sue_valor_maximo());
    	}
    	
    	if($tipo_carta == 4){
     		$transaccion = $this->getTransaccionBancariaDao()->traerTodosPorCarta($id);
     		$form->get('TRA_BAN_BENEFICIARIO')->setAttribute('value', $transaccion->getTra_ban_beneficiario());
     		$form->get('TRA_BAN_DIRECCION')->setAttribute('value', $transaccion->getTra_ban_direccion());
     		$form->get('TRA_BAN_CUENTA')->setAttribute('value', $transaccion->getTra_ban_cuenta());
     		$form->get('TRA_BAN_VALOR')->setAttribute('value', $transaccion->getTra_ban_valor());
     		$form->get('TRA_BAN_ABA')->setAttribute('value', $transaccion->getTra_ban_aba());
     		$form->get('TRA_BAN_BANCO')->setAttribute('value', $transaccion->getTra_ban_banco());
     		$form->get('TRA_BAN_BANCO_LINEA_DOS')->setAttribute('value', $transaccion->getTra_ban_banco_linea_dos());
     		$form->get('TRA_BAN_BANCO_DIRECCION')->setAttribute('value', $transaccion->getTra_ban_banco_direccion());
     		$form->get('TRA_BAN_DETALLE')->setAttribute('value', $transaccion->getTra_ban_detalle());
    	}
    	
    	$form->get ( 'direccion_empresa_oculto' )->setAttribute ( 'value', $carta->getCtr_direccion_empresa() );
    	
    	$view = new ViewModel ( array (
    			'formulario' => $form ,
    			//'tipo_usuario' => $this->tipo_usuario,
    			//'privado' => $this->privado,
    			//'id' => $id,
    			'action' => $this->params()->fromRoute('action')
    	) );
    	
    	$view->setTemplate('cartas/cartas/ingresar');
    	return $view;
    	
    }
    
    public function validarAction(){
    	
		//VERIFICA QUE SE HAYA REALIZADO UN POST DE INFORMACION
		if (! $this->request->isPost ()) {
			return $this->redirect ()->toRoute ( 'cartas', array (
					'controller' => 'cartas',
					'action' => 'listado' 
			) );
		}
		
		//CAPTURA LA INFORMACION ENVIADA EN EL POST
		$data = $this->request->getPost ();
		
		$form = $this->getForm();
		
		//SE VALIDA EL FORMULARIO
		$form->setInputFilter ( new CartaValidator() );
		
		//SE VALIDAN LOS CAMPOS CUANDO LA CARTA ES TRANSFERENCIA DE SUELDOS
		if($data['TIP_CAR_ID'] == 5){
			$form->getInputFilter()->get('TRA_SUE_VALOR_DEBITO')->setRequired(true);
			$form->getInputFilter()->get('TRA_SUE_NUMERO_CREDITOS')->setRequired(true);
			$form->getInputFilter()->get('TRA_SUE_VALOR_MAXIMO')->setRequired(true);
		}
		
		//SE VALIDAN LOS CAMPOS CUANDO LA CARTA ES TRANSACCION BANCARIA
		if($data['TIP_CAR_ID'] == 4){
			$form->getInputFilter()->get('TRA_BAN_BENEFICIARIO')->setRequired(true);
			$form->getInputFilter()->get('TRA_BAN_DIRECCION')->setRequired(true);
			$form->getInputFilter()->get('TRA_BAN_CUENTA')->setRequired(true);
			$form->getInputFilter()->get('TRA_BAN_VALOR')->setRequired(true);
			$form->getInputFilter()->get('TRA_BAN_ABA')->setRequired(true);
			$form->getInputFilter()->get('TRA_BAN_BANCO')->setRequired(true);
			$form->getInputFilter()->get('TRA_BAN_BANCO_DIRECCION')->setRequired(true);
			$form->getInputFilter()->get('TRA_BAN_CC')->setRequired(false);
			$form->getInputFilter()->get('TRA_BAN_DETALLE')->setRequired(true);
		}
		
		//SE VALIDA SI SE QUIERE MOSTRAR LA DIRECCION DE UNA EMPRESA
		if(strtoupper($data['CTR_ACTIVAR_DIRECCION']) == 'E'){
			$form->getInputFilter()->get('CTR_DIRECCION_EMPRESA')->setRequired(true);
		}
		
		//SE LLENAN LOS DATOS DEL FORMULARIO
		$form->setData ( $data );
		
		//SE VALIDA EL FORMULARIO ES CORRECTO
		if (! $form->isValid ()) {
			
			// SI EL FORMULARIO NO ES CORRECTO
			$modelView = new ViewModel ( array (
				'formulario' => $form ,
    			//'tipo_usuario' => $this->tipo_usuario,
    			//'privado' => $this->privado,
    			'action' => $this->params()->fromRoute('action')
			) );
			
			$modelView->setTemplate ( 'cartas/cartas/ingresar' );
			return $modelView;
		}
		
		//->AQUI EL FORMULARIO ES CORRECTO, SE VALIDO CORRECTAMENTE
		
		//SE GENERA EL OBJETO DE CONTACTO
		$carta = new CartaEntity();
		//SE CARGA LA ENTIDAD CON LA INFORMACION DEL POST
		$carta->exchangeArray ( $data );
		
		//SE GRABA LA INFORMACION EN LA BDD
		$codigo_carta = $this->getCartaDao() ->guardar ( $carta );
		
		//SI SE ACTUALIZA EL CONTACTO, SE BORRAN LOS DATOS ASOCIADOS
		if(!empty($data['CTR_ID']) && !is_null($data['CTR_ID'])){
			
			//SI EL USURIO ES DIFERENTE DE OPERADOR, PUEDE ELIMINAR LA INFORMACION
			$this->getCartaFirmaDao()->eliminarPorCarta($data['CTR_ID']);
			$this->getCartaDestinatarioDao()->eliminarPorCarta($data['CTR_ID']);
			
			$codigo_carta = $data['CTR_ID'];
			
		}else{
			$arreglo = array();
			foreach($codigo_carta as $codigo){
				$arreglo[] = $codigo;
			}
			
			$codigo_carta = $arreglo[0]['CURRVAL'];
		}
		
		if($data['TIP_CAR_ID'] == 5){
			//GUARDAR EN TRANSFERENCIA DE SUELDO
				
			if(!empty($data['CTR_ID']) && !is_null($data['CTR_ID'])){
				$this->getTransferenciaSueldoDao()->eliminarPorCarta($data['CTR_ID']);
			}
				
			$transferenciaSueldo = new TransferenciaSueldo();
			$transferenciaSueldoParams['CTR_ID'] = $codigo_carta;
			$transferenciaSueldoParams['TRA_SUE_VALOR_DEBITO'] = $data['TRA_SUE_VALOR_DEBITO'];
			$transferenciaSueldoParams['TRA_SUE_NUMERO_CREDITOS'] = $data['TRA_SUE_NUMERO_CREDITOS'];
			$transferenciaSueldoParams['TRA_SUE_VALOR_MAXIMO'] = $data['TRA_SUE_VALOR_MAXIMO'];
			$transferenciaSueldo->exchangeArray($transferenciaSueldoParams);
			$this->getTransferenciaSueldoDao()->guardar($transferenciaSueldo);
				
		}
		
		if($data['TIP_CAR_ID'] == 4){
			//GUARDAR EN TRANSACCIO BANCARIA
		
			if(!empty($data['CTR_ID']) && !is_null($data['CTR_ID'])){
				$this->getTransaccionBancariaDao()->eliminarPorCarta($data['CTR_ID']);
			}
		
			$transaccionBancaria = new TransaccionBancaria();
			$transaccionBancariaParams['CTR_ID'] = $codigo_carta;
			$transaccionBancariaParams['TRA_BAN_BENEFICIARIO'] = $data['TRA_BAN_BENEFICIARIO'];
			$transaccionBancariaParams['TRA_BAN_DIRECCION'] = $data['TRA_BAN_DIRECCION'];
			$transaccionBancariaParams['TRA_BAN_CUENTA'] = $data['TRA_BAN_CUENTA'];
			$transaccionBancariaParams['TRA_BAN_VALOR'] = $data['TRA_BAN_VALOR'];
			$transaccionBancariaParams['TRA_BAN_ABA'] = $data['TRA_BAN_ABA'];
			$transaccionBancariaParams['TRA_BAN_BANCO'] = $data['TRA_BAN_BANCO'];
			$transaccionBancariaParams['TRA_BAN_BANCO_LINEA_DOS'] = $data['TRA_BAN_BANCO_LINEA_DOS'];
			$transaccionBancariaParams['TRA_BAN_BANCO_DIRECCION'] = $data['TRA_BAN_BANCO_DIRECCION'];
			$transaccionBancariaParams['TRA_BAN_CC'] = $data['TRA_BAN_CC'];
			$transaccionBancariaParams['TRA_BAN_DETALLE'] = $data['TRA_BAN_DETALLE'];
			$transaccionBancaria->exchangeArray($transaccionBancariaParams);
			$this->getTransaccionBancariaDao()->guardar($transaccionBancaria);
		
		}
		
		//GRABA LA INFORMACION DEL DESTINATARIO DE LA CARTA
		$cartaDestinatario = new CartaDestinatario();
		$cartaDestinatarioParams['CTR_ID'] = $codigo_carta;
		$cartaDestinatarioParams['CON_ID'] = $data['CON_ID'];
		$cartaDestinatarioParams['CAR_DES_PRINCIPAL'] = 'S';
		$cartaDestinatario->exchangeArray($cartaDestinatarioParams);
		$this->getCartaDestinatarioDao()->guardar($cartaDestinatario);
		
		//GRABA LA INFORMACION DE QUIENES FIRMAN LA CARTA
		$cartaFirma = new CartaFirma();
		$cartaFirmaParams['CTR_ID'] = $codigo_carta;
		$cartaFirmaParams['CAR_FIR_TIPO'] = 'P';
		$cartaFirmaParams['CAR_FIR_NOMBRE'] = $data['EPL_ID_UNO'];
		$cartaFirmaParams['CAR_FIR_CARGO'] = $data['CARGO_UNO'];
		
		
		$cartaFirma->exchangeArray($cartaFirmaParams);
		$this->getCartaFirmaDao()->guardar($cartaFirma);
		
		if(
			!empty($data['EPL_ID_DOS']) && !is_null($data['EPL_ID_DOS']) &&
			!empty($data['CAR_FIR_CARGO']) && !is_null($data['CAR_FIR_CARGO'])
		){
			$cartaFirma = new CartaFirma();
			$cartaFirmaParams['CTR_ID'] = $codigo_carta;
			$cartaFirmaParams['CAR_FIR_TIPO'] = 'S';
			$cartaFirmaParams['CAR_FIR_NOMBRE'] = $data['EPL_ID_DOS'];
			$cartaFirmaParams['CAR_FIR_CARGO'] = $data['CARGO_DOS'];
			
			$cartaFirma->exchangeArray($cartaFirmaParams);
			$this->getCartaFirmaDao()->guardar($cartaFirma);
		}
		
        //SI SE EJECUTO EXITOSAMENTE SE REGRESA AL LISTADO DE CONTACTOS
		return $this->redirect ()->toRoute ( 'cartas', array (
				'controller' => 'cartas',
				'action' => 'listado' 
		) );
    }
    
    public function procesarAction(){
    	
    	date_default_timezone_set('America/Guayaquil');
    	$anio = date('Y');
    	
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$ei = $this->getCartaDao()->traerEmpresaInterna($id);
    	
    	foreach ($ei as $emp){
    		$empresa_interna = $emp->getEmp_int_abreviacion();
    	}
    	
    	$role = $_SESSION['Zend_Auth']['storage']->us_role;
    	
    	
    	switch ($role){
    		case 1:
    			$text_role = 'ADM';
    			break;
    		case 3:
    			$text_role = 'OPE';
    			break;
    		case 2:
    			$text_role = 'ADM';
    			break;
    		default:
    			$text_role = 'OPE';
    			break;
    	}
    	
    	$this->getCartaDao()->procesar($id, $text_role, $anio, $empresa_interna);
    	$this->redirect()->toRoute('cartas', array('controller' => 'cartas', 'action' => 'listado'));
    	
    }
    
    public function duplicarAction(){
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$carta = $this->getCartaDao()->traer($id);

    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCarta($carta->getCtr_id());
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($carta->getCtr_id());
    	
    	$ctr_id = $this->getCartaDao() ->duplicar ( $carta );
    	
    	$arreglo = array();
    	foreach($ctr_id as $codigo){
    		$arreglo[] = $codigo;
    	}
    		
    	$codigo_carta = $arreglo[0]['CURRVAL'];
    	
    	$this->getCartaDestinatarioDao() ->duplicar ( $carta_destinatario, $codigo_carta );
    	
    	foreach ($carta_firma as $fir){
    		$this->getCartaFirmaDao() ->duplicar ( $fir, $codigo_carta );
    	}
    	
    	$tipo_carta = $carta->getTip_car_id();
    	
    	//TRANSACCION BANCARIA
    	if($tipo_carta == 4){
    		$transaccion = $this->getTransaccionBancariaDao()->traerTodosPorCarta($carta->getCtr_id());
    		$this->getTransaccionBancariaDao()->duplicar($transaccion, $codigo_carta);
    	}
    	
    	//TRANSFERENCIA DE SUELDO
    	if($tipo_carta == 5){
    		$transferencia = $this->getTransferenciaSueldoDao()->traerTodosPorCarta($carta->getCtr_id());
    		$this->getTransferenciaSueldoDao()->duplicar($transferencia, $codigo_carta);
    	}
    	
    	
    	$this->redirect()->toRoute('cartas', array('controller' => 'cartas', 'action' => 'listado'));
    	
    }
    
    public function cartaformalAction(){
    	
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$carta = $this->getCartaDao()->traer($id);
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($id);
    	
    	$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	
    	$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	
    	$emp_emp_id = $empresa->getEmp_emp_id();
    	$direccion = $carta->getCtr_direccion_empresa();
    	
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    	}else{
    		$empresa_padre = $empresa;
    	}
    	
    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	
    	if(!empty($direccion) && !is_null($direccion)){
    		$empresa_direccion = $this->getEmpresaDao()->traer($direccion);
    	}else{
    		$empresa_direccion = '';
    	}
    	
    	$pdf = new PdfModel();
    	$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
    	$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
    	$pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"
    	
    	$pdf->setVariables(array(
    			'carta' => $carta,
    			'contacto' => $contacto,
    			'carta_firma' => $carta_firma,
    			'empresa' => $empresa_padre,
    			'direccion_e' => $empresa_direccion
    	));
    	 
    	return $pdf;
    	
    }
    
    public function cartainformalAction(){
    	 
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	 
    	$carta = $this->getCartaDao()->traer($id);
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($id);
    	
    	$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	
    	$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	 
    	$emp_emp_id = $empresa->getEmp_emp_id();
    	$direccion = $carta->getCtr_direccion_empresa();
    	 
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    	}else{
    		$empresa_padre = $empresa;
    	}
    	
    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	
    	
    	if(!empty($direccion) && !is_null($direccion)){
    		$empresa_direccion = $this->getEmpresaDao()->traer($direccion);
    	}else{
    		$empresa_direccion = '';
    	}
    	 
    	$pdf = new PdfModel();
    	$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
    	$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
    	$pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"
    	 
    	$pdf->setVariables(array(
    			'carta' => $carta,
    			'contacto' => $contacto,
    			'carta_firma' => $carta_firma,
    			'empresa' => $empresa_padre,
    			'direccion_e' => $empresa_direccion
    	));
    
    	return $pdf;
    	 
    }
    
    public function cartafaxAction(){
    
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    
    	$carta = $this->getCartaDao()->traer($id);
    	$empresa_interna = $this->getEmpresaInternaDao()->traer($carta->getEmp_int_id());
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($id);
    	 
    	//DESTINATARIO
    	$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	
    	//VARIABLE PARA VERIFICAR SI TIENE SUCURSAL O ES EMPRESA
    	$emp_emp_id = $empresa->getEmp_emp_id();
    
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		//EMPRESA A MOSTRAR DEL DESTINATARIO
    		//SI TIENE SUCURSAL, TRAE EMPRESA
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    	}else{
    		//EMPRESA A MOSTRAR DEL DESTINATARIO
    		$empresa_padre = $empresa;
    	}
    	
    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	
    	$carta_from = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	
    	$pdf = new PdfModel();
    	$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
    	$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
    	$pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"
    
    	$pdf->setVariables(array(
    			'carta' => $carta,
    			'contacto' => $contacto,
    			'carta_firma' => $carta_firma,
    			'firma_from' => $carta_from,
    			'empresa' => $empresa_padre,
    			'empresa_interna' => $empresa_interna
    	));
    
    	return $pdf;
    
    }
    
    public function cartabancariaAction(){
    
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    
    	$carta = $this->getCartaDao()->traer($id);
    	$empresa_interna = $this->getEmpresaInternaDao()->traer($carta->getEmp_int_id());
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($id);
    	$transaccion_bancaria = $this->getTransaccionBancariaDao()->traerTodosPorCarta($id);

    	//DESTINATARIO
    	$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	 
    	//VARIABLE PARA VERIFICAR SI TIENE SUCURSAL O ES EMPRESA
    	$emp_emp_id = $empresa->getEmp_emp_id();
    
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		//EMPRESA A MOSTRAR DEL DESTINATARIO
    		//SI TIENE SUCURSAL, TRAE EMPRESA
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    	}else{
    		//EMPRESA A MOSTRAR DEL DESTINATARIO
    		$empresa_padre = $empresa;
    	}
    	 
    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	 
    	$carta_from = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	 
    	$pdf = new PdfModel();
    	$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
    	$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
    	$pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"
    
    	$pdf->setVariables(array(
    			'carta' => $carta,
    			'contacto' => $contacto,
    			'carta_firma' => $carta_firma,
    			'firma_from' => $carta_from,
    			'empresa' => $empresa_padre,
    			'empresa_interna' => $empresa_interna,
    			'transaccion_bancaria' => $transaccion_bancaria,
    	));
    
    	return $pdf;
    
    }

    public function cartasueldoAction(){
    	
    	$id = ( int ) $this->params ()->fromRoute ( 'id', 0 );
    	
    	$carta = $this->getCartaDao()->traer($id);
    	$carta_destinatario = $this->getCartaDestinatarioDao()->traer($id);
    	 
    	$contacto = $this->getContactoDao()->traer($carta_destinatario->getCon_id());
    	 
    	$empresa = $this->getEmpresaDao()->traer($contacto->getEmp_id());
    	 
    	$emp_emp_id = $empresa->getEmp_emp_id();
    	 
    	if(!empty($emp_emp_id) && !is_null($emp_emp_id)){
    		$empresa_padre = $this->getEmpresaDao()->traer($emp_emp_id);
    	}else{
    		$empresa_padre = $empresa;
    	}
    	 
    	$carta_firma = $this->getCartaFirmaDao()->traerTodosPorCartaEmpleado($id);
    	$sueldo = $this->getTransferenciaSueldoDao()->traerUnicoPorCarta($id);
    	 
    	$pdf = new PdfModel();
    	$pdf->setOption('fileName', 'registro'); // Triggers PDF download, automatically appends ".pdf"
    	$pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
    	$pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"
    	 
    	$pdf->setVariables(array(
    			'carta' => $carta,
    			'contacto' => $contacto,
    			'carta_firma' => $carta_firma,
    			'empresa' => $empresa_padre,
    			'sueldo' => $sueldo,
    	));
    
    	return $pdf;
    	 
    }
    
    public function getForm() {
    	
    	$form = new Carta();
    	$form->get ( 'TIP_CAR_ID' )->setValueOptions ( $this->getTipoCartaDao ()->traerTodosArreglo () );
    	$form->get ( 'EMP_INT_ID' )->setValueOptions ( $this->getEmpresaInternaDao ()->traerTodosArreglo () );
    	$form->get ( 'EMP_ID' )->setValueOptions ( $this->getEmpresaDao ()->traerEmpresas () );
    	$form->get ( 'PRO_ID' )->setValueOptions ( $this->getProyectoDao ()->traerTodosArreglo () );
    	return $form;
    }
    
    public function getCartaDao() {
    	if (! $this->cartaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->cartaDao = $sm->get ( 'Cartas\Model\Dao\CartaDao' );
    	}
    	return $this->cartaDao;
    }
    
    public function getCartaFirmaDao() {
    	if (! $this->cartaFirmaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->cartaFirmaDao = $sm->get ( 'Cartas\Model\Dao\CartaFirmaDao' );
    	}
    	return $this->cartaFirmaDao;
    }
    
    public function getCartaDestinatarioDao() {
    	if (! $this->cartaDestinatarioDao) {
    		$sm = $this->getServiceLocator ();
    		$this->cartaDestinatarioDao = $sm->get ( 'Cartas\Model\Dao\CartaDestinatarioDao' );
    	}
    	return $this->cartaDestinatarioDao;
    }
    
    public function getTipoCartaDao() {
    	if (! $this->tipoCartaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->tipoCartaDao = $sm->get ( 'Cartas\Model\Dao\TipoCartaDao' );
    	}
    	return $this->tipoCartaDao;
    }

    public function getEmpresaInternaDao() {
    	if (! $this->empresaInternaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->empresaInternaDao = $sm->get ( 'Cartas\Model\Dao\EmpresaInternaDao' );
    	}
    	return $this->empresaInternaDao;
    }

    public function getEmpresaDao() {
    	if (! $this->empresaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->empresaDao = $sm->get ( 'Cartas\Model\Dao\EmpresaDao' );
    	}
    	return $this->empresaDao;
    }
    
    public function getEmpleadoDao() {
    	if (! $this->empleadoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->empleadoDao = $sm->get ( 'Cartas\Model\Dao\EmpleadoDao' );
    	}
    	return $this->empleadoDao;
    }

    public function getProyectoDao() {
    	if (! $this->proyectoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->proyectoDao = $sm->get ( 'Cartas\Model\Dao\ProyectoDao' );
    	}
    	return $this->proyectoDao;
    }
    
    public function getContactoDao() {
    	if (! $this->contactoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->contactoDao = $sm->get ( 'Cartas\Model\Dao\ContactoDao' );
    	}
    	return $this->contactoDao;
    }
    
    public function getTransferenciaSueldoDao() {
    	if (! $this->transferenciaSueldoDao) {
    		$sm = $this->getServiceLocator ();
    		$this->transferenciaSueldoDao = $sm->get ( 'Cartas\Model\Dao\TransferenciaSueldoDao' );
    	}
    	return $this->transferenciaSueldoDao;
    }
    
    public function getTransaccionBancariaDao() {
    	if (! $this->transaccionBancariaDao) {
    		$sm = $this->getServiceLocator ();
    		$this->transaccionBancariaDao = $sm->get ( 'Cartas\Model\Dao\TransaccionBancariaDao' );
    	}
    	return $this->transaccionBancariaDao;
    }
    
    public function contactosAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$sucursal = $this->request->getPost('sucursal');
    		$data = $this->getContactoDao()->getContactosPorSucursal($sucursal);
    
    		$jsonData = json_encode($data);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
    public function contactosempresaAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$empresa = $this->request->getPost('empresa');
    		$data = $this->getContactoDao()->getContactosPorEmpresa($empresa);
    
    		$jsonData = json_encode($data);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
    public function empresadireccionAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$empresa = $this->request->getPost('empresa');
    		$data = $this->getEmpresaDao()->traerDireccionEmpresa($empresa);
    		
    		$jsonData = json_encode($data);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
    public function sucursaldireccionAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$empresa = $this->request->getPost('empresa');
    		$data = $this->getEmpresaDao()->traerDireccionSucursalesEmpresa($empresa);
    
    		$jsonData = json_encode($data);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
    public function cargoAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$emp_id = $this->request->getPost('empleado');
    		$data = $this->getEmpleadoDao() ->traer($emp_id);
    		
    		$valores = array();
    		$valores['epl_cargo'] = $data->getEpl_cargo();
    
    		$jsonData = json_encode($valores);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
    public function proyectoAction(){
    	if($this->getRequest()->isXmlHttpRequest()){
    		$pro_id = $this->request->getPost('proyecto');
    		$data = $this->getProyectoDao()->traer($pro_id);
    
    		$valores = array();
    		$valores['pro_descripcion'] = $data->getPro_descripcion();
    		$valores['pro_id'] = $data->getPro_id();
    
    		$jsonData = json_encode($valores);
    		$response = $this->getResponse();
    		$response->setStatusCode(200);
    		$response->setContent($jsonData);
    
    		return $response;
    	}else{
    		return $this->redirect()->toRoute('cartas', array('cartas' => 'ingresar'));
    	}
    }
    
}