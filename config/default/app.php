<?php

	return Affinity\Config::create(['providers', 'middleware', 'routes'], [
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

			//
			// The provider mapping lists concrete class providers for given interfaces, the
			// interface is the key, while the class is the value.  In the setup below if
			// the broker is tasked with creating an EntityInterface, it will use the
			// AnonymousUser.
			//

			'mapping' => [
				'iMarc\Auth\EntityInterface'                => 'Inkwell\Auth\AnonymousUser',
				'Doctrine\Common\Persistence\ObjectManager' => 'Doctrine\ORM\EntityManager'
			]
		],

		'@middleware' => [

			//
			// Middleware providers can be a class or a closure
			//

			'providers' => [
				'Sandstorm\Security\Auth',
				'Inkwell\Doctrine\Middleware\Flush',
			]
		],

		//
		// Global routing configuration
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
				'/'                => 'Sandstorm\AccountController::enter',
				'/login'           => 'Sandstorm\AccountController::login',
				'/profile'         => 'Sandstorm\AccountController::profile',
				'/create'          => 'Sandstorm\AccountController::create',
				'/dashboard'       => 'Sandstorm\DashboardController::main',
				'/user/[!:method]' => 'Sandstorm\UserController::[lc:method]', // actions, organizations
				'/[(.*):path]'     => 'Sandstorm\MainController::page'
			],

			//
			//
			//

			'handlers' => [

			],

			//
			//
			//

			'redirects' => [

			]
		]
	]);
