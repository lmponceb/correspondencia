<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

 return array(
 		
 		'db' => array(
 				'driver'            => 'OCI8',
 				'connection_string' => 'localhost/xe',
 				'character_set'     => 'AL32UTF8',
 		),
 		'db_view' => array(
 				'driver'            => 'OCI8',
 				'connection_string' => 'localhost/xe',
 				'character_set'     => 'AL32UTF8',
 		),
 		
//     'db' => array(
//         'driver'            => 'OCI8',
//         'connection_string' => 'xeon.azul.com.ec/prueba10',
//         'character_set'     => 'AL32UTF8', 
//     ),
//     'db_view' => array(
//         'driver'            => 'OCI8',
//         'connection_string' => 'xeon.azul.com.ec/prueba10',
//         'character_set'     => 'AL32UTF8', 
//     ),   

     'service_manager' => array(
         'factories' => array(
             'Zend\Db\Adapter\Adapter'
                     => 'Zend\Db\Adapter\AdapterServiceFactory',
         ),
     ),
 		
 	'module_layouts' => array(
 		'Application'  => 'layout/layout.phtml',
 		'Empresas'  => 'layout/layoutCorrespondencia.phtml',
 		'Contactos' => 'layout/layoutCorrespondencia.phtml',
 		'Cartas'    => 'layout/layoutCorrespondencia.phtml',
        'Usuarios'    => 'layout/layoutCorrespondencia.phtml',
        'Parametros'    => 'layout/layoutCorrespondencia.phtml',
 	),
 	
 	'translator' => array(
 			'locale' => 'es_ES'
 	),
 );