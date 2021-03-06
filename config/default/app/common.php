<?php

	use IW\HTTP;
	use ICanBoogie\Inflector;

	return Affinity\Config::create(['providers', 'middleware', 'routes', 'auth', 'firewall'], [

		'@providers' => [
			//
			//
			//
			'params' => [
				'Services_Twilio' => [
					':sid'   => $app->getEnvironment('TWILIO_SID'),
					':token' => $app->getEnvironment('TWILIO_TOKEN')
				]
			],

			'mapping' => [
				'Doctrine\Common\Persistence\ObjectManager' => 'Doctrine\ORM\EntityManager',
				'ICanBoogie\Inflector' => function() {
					return Inflector::get(Inflector::DEFAULT_LOCALE);
				}
			]
		],

		'@middleware' => [

			//
			// Middleware providers can be a class or a closure
			//

			'providers' => [
				'Sandstorm\Security\Authorization',
				'Sandstorm\Security\Firewall',
				'Inkwell\Doctrine\Middleware\Flush',
			]
		],

		//
		// Routing configuration
		//

		'@routes' => [

			//
			// The base URL for all configured anchors, handlers, and redirects in this
			// context
			//

			'base_url' => '/',

			//
			//
			//

			'links' => [
				'/'                                => 'Sandstorm\AccountController::enter',
				'/login'                           => 'Sandstorm\AccountController::login',
				'/recover'                         => 'Sandstorm\AccountController::recover',
				'/profile'                         => 'Sandstorm\AccountController::profile',
				'/create'                          => 'Sandstorm\AccountController::create',
				'/dashboard'                       => 'Sandstorm\DashboardController::main',
				'/user/[$:method]/'                => 'Sandstorm\UserController::[lc:method]',
				'/[$:class]/'                      => 'Sandstorm\[uc:class]Controller::manage',
				'/[$:class]/[+:id]-[!:slug]'       => 'Sandstorm\[uc:class]Controller::select',
				'/[(.*):path]'                     => 'Sandstorm\MainController::page'
			],

			//
			//
			//

			'hrefs' => [
				'Sandstorm\Organization' => [
					'view' => '/organizations/[id]-[ws:name]'
				]
			],

			//
			//
			//

			'handlers' => [
				HTTP\NOT_FOUND => 'Sandstorm\MainController::notFound'
			],

			//
			//
			//

			'redirects' => [
				HTTP\REDIRECT_PERMANENT => [
					'/user'  => '/dashboard',
				]
			]
		],

		'@auth' => [

			'aliases' => [
				'manage' => ['create', 'remove', 'update', 'select'],
				'admin'  => ['manage', 'permit']
			],

			'permissions' => [
				'User' => [
					'Sandstorm\Organization' => ['manage'],
				],

				'Admin' => [
					'Sandstorm\Action' => ['manage'],
				]
			]
		],

		'@firewall' => [
			'public' => [
				'/',
				'/login',
				'/create',
				'/recover'
			],

			'private' => [
				'/admin/(.*)' => ['Admin']
			]
		]
	]);
