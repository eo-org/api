<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'Rest\Address' => 'Rest\Controller\AddressController',
		)
	),
	'router' => array(
		'routes' => array(
			'rest' => array(
				'type' => 'literal',
				'options' => array(
					'route' => '/rest'
				),
				'may_terminate' => true,
				'child_routes' => array(
					'rest-childroutes' => array(
						'type' => 'segment',
						'options' => array(
							'route' => '/address[.:format][/:id]',
							'constraints' => array(
								'format' => '(json|html)',
								'id' => '[0-9]*'
							),
							'defaults' => array(
								'controller' => 'Rest\Address',
								'format' => 'json'
							)
						),
					),
				)
			),
		),
	),
	'view_manager' => array(
		'display_not_found_reason' => true,
		'display_exceptions'       => true,
		'doctype'                  => 'HTML5',
		'not_found_template'       => 'error/404',
		'exception_template'       => 'error/index',
		'template_map' => array(
			'layout/layout'				=> __DIR__ . '/../view/layout/layout.phtml',
			'error/404'					=> __DIR__ . '/../view/error/404.phtml',
			'error/index'				=> __DIR__ . '/../view/error/index.phtml',
		),
		'strategies' => array(
			'ViewJsonStrategy'
		),
	),
);