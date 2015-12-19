<?php

$people  = new Sandstorm\People($app['entity.manager']);
$locator = new Sandstorm\Locator();
$track   = $app->getWriteDirectory('exports') . '/national.syncdate';
$fails   = $app->getWriteDirectory('exports') . '/national.failures';
$builder = $app['entity.manager']->createQueryBuilder();
$count   = 0;
$fd      = fopen($fails, 'w+');

if (!file_exists($track)) {
	file_put_contents($track, '');
}

if (!($last = file_get_contents($track))) {
	$last = new DateTime('-6 months');
} else {
	$last = new DateTime($last);
}

$builder->select('p')
	->from('Sandstorm\Person', 'p')
	->where('p.dateJoined > ?1')
	->setParameter(1, $last);

foreach ($builder->getQuery()->getResult() as $person) {

	if (!$person->getPostalCode()) {
		continue;
	}

	$name_parts = explode(' ', $person->getName());

	$post = [
		'custom-1910' => 'sandstorm@dotink.org',
		'submit-btn'  => 'Submit and enter next volunteer',
		'firstname'   => isset($name_parts[0]) ? $name_parts[0] : $person->getNickName(),
		'lastname'    => end($name_parts) ?: 'Unknown',
		'email'       => $person->getEmailAddress(),
		'city'        => $person->getCity() ?: 'Unknown',
		'state_cd'    => $person->getState() ?: 'CA',
		'zip'         => $person->getPostalCode(),
		'phone'       => $person->getPrimaryPhoneNumber() ? $person->getPrimaryPhoneNumber()->getDigits() : '',
	];

	var_dump($post);

	$data = @http_build_query($post);
	$fp   = @fopen('https://go.berniesanders.com/page/s/sign-up-new-volunteers', 'rb', false, stream_context_create([
		'http' => [
			'method' => 'POST',
			'header'  => implode("\r\n", [
				'Host: go.berniesanders.com',
				'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) Gecko/20100101 Firefox/40.0',
				'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
				'Accept-Language: en-US,en;q=0.5',
				'Referer: https://go.berniesanders.com/page/s/sign-up-new-volunteers',
				'Connection: keep-alive',
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen($data),
			]),
			'content' => $data
		]
	]));

	$response = stream_get_meta_data($fp);

	if (!$response) {
		echo PHP_EOL . 'Failed!' . PHP_EOL;
		fputcsv($fd, $post);
	}

	sleep(10);

	$count++;
}

echo PHP_EOL;
echo 'Exported ' . $count . ' people to national.';

file_put_contents($track, date('Y-m-d'));
