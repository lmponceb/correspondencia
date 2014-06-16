<?php 
namespace Parametros\Funciones;
/**
* Funciones: Contiene funciones globales del sistema
*/
class Funciones
{
    public static function translateAndFormatDate($date,$language='E',$inFormat='d/m/Y'){
        
        $months=array(
            'I'=>array(
                '1'=>'January',     '2'=>'February',    '3'=>'March',
                '4'=>'April',       '5'=>'May',         '6'=>'June',
                '7'=>'July',        '8'=>'August',      '9'=>'September',
                '10'=>'October',    '11'=>'November',   '12'=>'December'
                ),
            'E'=>array(
                '1'=>'enero',       '2'=>'febrero',     '3'=>'marzo',
                '4'=>'abril',       '5'=>'mayo',        '6'=>'junio',
                '7'=>'julio',       '8'=>'agosto',      '9'=>'septiembre',
                '10'=>'octubre',    '11'=>'noviembre',  '12'=>'diciembre'
                )
            );
        $date_info=date_parse_from_format($inFormat,$date);

        switch($language){
            case 'I':
                return $months[$language][$date_info['month']].' '.$date_info['day'].', 20'.$date_info['year'];
            break;
            case 'E':
                return $date_info['day'].' de '.
                $months[$language][$date_info['month']].' de 20'.
                $date_info['year'];
            break;
        } 

    }        

    public static function fechaFormateada($date,$language='E',$inFormat='d/m/Y'){
    	$months=array(
    			'I'=>array(
    					'1'=>'January',     '2'=>'February',    '3'=>'March',
                		'4'=>'April',       '5'=>'May',         '6'=>'June',
                		'7'=>'July',        '8'=>'August',      '9'=>'September',
                		'10'=>'October',    '11'=>'November',   '12'=>'December'
    			),
    			'E'=>array(
    					'1'=>'enero',       '2'=>'febrero',     '3'=>'marzo',
    					'4'=>'abril',       '5'=>'mayo',        '6'=>'junio',
    					'7'=>'julio',       '8'=>'agosto',      '9'=>'septiembre',
    					'10'=>'octubre',    '11'=>'noviembre',  '12'=>'diciembre'
    			)
    	);
    	$date_info=date_parse_from_format($inFormat,$date);
    	switch($language){
    		case 'I':
    			return $months[$language][$date_info['month']].' '.$date_info['day'].', '.$date_info['year'];
    			break;
    		case 'E':
    			return $date_info['day'].' de '.$months[$language][$date_info['month']].' de '.$date_info['year'];
    			break;
    	}
    
    }

}
