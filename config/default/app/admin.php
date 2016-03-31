<?php

	use IW\HTTP;

	return Affinity\Config::create(['routes'], [
		//
		// Routing configuration
		//

		'@routes' => [

			//
			// The base URL for all configured anchors, handlers, and redirects in this
			// context
			//

			'base_url' => '/admin',

			//
			//
			//

			'links' => [
				'/dashboard'                       => 'Sandstorm\Admin\DashboardController::main',
				'/[$:class]/'                      => 'Sandstorm\Admin\[uc:class]Controller::manage',
				'/[$:class]/[+:id]-[!:slug]'       => 'Sandstorm\Admin\[uc:class]Controller::select',
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

			'redirects' => [
				HTTP\REDIRECT_PERMANENT => [
					'/'  => '/admin/dashboard',
				]
			]
		],
	]);
