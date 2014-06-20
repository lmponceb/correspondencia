<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Cartas\Controller\Cartas' => 'Cartas\Controller\CartasController',
        	'Cartas\Controller\Recepcion' => 'Cartas\Controller\RecepcionController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'cartas' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/cartas[/:controller][/:action][/:id][/:lang]',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Cartas\Controller',
                        'controller'    => 'Cartas',
                        'action'        => 'listado',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id[/:lang]]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            	'id'     => '[0-9]*',
                            	'lang'     => '[a-zA-Z]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Cartas' => __DIR__ . '/../view',
        ),
    ),
);
