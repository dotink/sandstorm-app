<?php

$people  = new Sandstorm\People($app['entity.manager']);
$locator = new Sandstorm\Locator();

foreach ($people->findAll() as $person) {
	if (!$person->getLongitude()) {
		$locator->update($person);
	}
}

$app['entity.manager']->flush();
