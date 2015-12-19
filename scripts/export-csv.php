<?php

$people  = new Sandstorm\People($app['entity.manager']);
$locator = new Sandstorm\Locator();
$track   = $app->getWriteDirectory('exports') . '/csv.syncdate';
$export  = $app->getWriteDirectory('exports') . '/people' . date(Y-m-d) . '.csv';
$builder = $app['entity.manager']->createQueryBuilder();
$count   = 0;
$fp      = fopen($export, 'w+');

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
	$name_parts = explode(' ', $person->getName());

	$data = [
		'first_name'  => isset($name_parts[0]) ? $name_parts[0] : $person->getNickName(),
		'last_name'   => end($name_parts) ?: 'N/A',
		'email'       => $person->getEmailAddress(),
		'city'        => $person->getCity() ?: 'N/A',
		'state'       => $person->getState() ?: 'N/A',
		'zip'         => $person->getPostalCode(),
		'phone'       => $person->getPrimaryPhoneNumber() ? $person->getPrimaryPhoneNumber()->getDigits() : '',
	];

	fputcsv($fp, $data);

	$count++;
}

echo PHP_EOL;
echo 'Exported ' . $count . ' people to CSV';

file_put_contents($track, date('Y-m-d'));
