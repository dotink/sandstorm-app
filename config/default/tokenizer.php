<?php

	return Affinity\Config::create([
		'key'                  => 'Replace with a strong key',
		'desired_algorithm'    => 'HS512',
		'supported_algorithms' => ['HS256', 'HS384', 'HS512', 'RS256']
	]);
