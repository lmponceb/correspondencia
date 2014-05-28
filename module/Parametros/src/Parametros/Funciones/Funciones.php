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
                '1'=>'Enero',       '2'=>'Febrero',     '3'=>'Marzo',
                '4'=>'Abril',       '5'=>'Mayo',        '6'=>'Junio',
                '7'=>'Julio',       '8'=>'Agosto',      '9'=>'Septiembre',
                '10'=>'Octubre',    '11'=>'Noviembre',  '12'=>'Diciembre'
                )
            );
        $date_info=date_parse_from_format($inFormat,$date); 
        switch($language){
            case 'I':
                return $months[$language][$date_info['month']].' '.$date_info['day'].', 20'.$date_info['year'];
            break;
            case 'E':
                return $date_info['day'].' de '.$months[$language][$date_info['month']].' de 20'.$date_info['year'];
            break;
        } 

    }              

}
