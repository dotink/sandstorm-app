<?php namespace Inkwell
{
	use Exception;
	use Closure;
	use IW;

	$message = NULL;

	try {

		//
		// Track backwards until we discover our includes directory.  The only file required
		// to be in place for this is includes/init.php which should return our application
		// instance.
		//

		for (
			$init_path  = __DIR__;
			$init_path != '/' && !is_file($init_path . DIRECTORY_SEPARATOR . 'init.php');
			$init_path  = realpath($init_path . DIRECTORY_SEPARATOR . '..')
		);

		if ($app = @include($init_path . DIRECTORY_SEPARATOR . 'init.php')) {

			//
			// We've got an application instance so let's run!
			//

			exit($app->run());
		}

	} catch (Exception $e) {
		$message = $e->getMessage();
	}

	header('HTTP/1.1 500 Internal Server Error');
	echo 'There was a problem initializing the application: ' . ($message ?: 'Unknown Error');
	exit(-1);
}
