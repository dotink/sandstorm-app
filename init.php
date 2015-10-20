<?php namespace Inkwell
{
	use Affinity;
	use Auryn\Injector;
	use Dotenv\Dotenv;
	use InvalidArgumentException;

	$loader    = require 'vendor/autoload.php';
	$constants = require 'constants.php';

 	foreach ($constants as $const => $value) {
		define('IW\\' . $const, $value);
	}

	$app  	= new Core(realpath(__DIR__));
	$broker = new Injector();

	if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '.env')) {
		$dotenv = new Dotenv(__DIR__);
		$dotenv->load();
	}

	$config_dir    = $app->getDirectory($app->getEnvironment('IW_CONFIG_ROOT', 'config'));
	$action_dir    = $app->getDirectory($app->getEnvironment('IW_ACTION_ROOT', 'include'));
	$environment   = $app->getEnvironment('IW_ENVIRONMENT', 'prod');

	$app['broker'] = $broker;
	$app['loader'] = $loader;
	$app['engine'] = new Affinity\Engine(
		new Affinity\NativeDriver($config_dir),
		new Affinity\NativeDriver($action_dir)
	);

	$app['engine']->start($environment, ['app' => $app, 'broker' => $broker]);

	return $app;
}
