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
				'iMarc\Auth\EntityInterface' => 'Inkwell\Auth\AnonymousUser'
			]
		],

		'@middleware' => [

			//
			// Middleware providers can be a class or a closure
			//

			'providers' => [
				'Sandstorm\Security\AuthService'
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
				'/'            => 'Sandstorm\AccountController::enter',
				'/login'       => 'Sandstorm\AccountController::login',
				'/[(.*):path]' => 'Sandstorm\MainController::page'
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
