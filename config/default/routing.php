<?php

	return Affinity\Config::create(['providers', 'routes'], [

		//
		// Whether or not we should attempt to try URLs with and without trailing slashes
		//

		'restless' => TRUE,

		//
		// The default word separator for translated url components
		//

		'word_separator' => '-',

		//
		// @providers allows you to wire together dependencies
		//
		
		'@providers' => [

			//
			// The provider mapping lists concrete class providers for given interfaces, the
			// interface is the key, while the class is the value.
			//

			'mapping' => [
				'Inkwell\Routing\EngineInterface'     => 'Inkwell\Routing\Engine',
				'Inkwell\Routing\ParserInterface'     => 'Inkwell\Routing\Parser',
				'Inkwell\Routing\CompilerInterface'   => 'Inkwell\Routing\Compiler',
				'Inkwell\Routing\CollectionInterface' => 'Inkwell\Routing\Collection'
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