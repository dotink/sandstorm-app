<?php

$manager  = $app['entity.manager'];
$people   = new Sandstorm\People($manager);
$numbers  = new Sandstorm\PhoneNumbers($manager);
$acttypes = new Sandstorm\ActionTypes($manager);

if (!isset($data_import_file)) {
	echo 'No $data_import_file set';
	return;
}

$fp      = fopen($data_import_file, 'r');
$headers = fgetcsv($fp);
$canvass = $acttypes->findOneByName('Knock on Doors');
$bank    = $acttypes->findOneByName('Call Voters');
$vreg    = $acttypes->findOneByName('Register Voters');
$table   = $acttypes->findOneByName('Work a Table');
$x       = 1;

while ($data = fgetcsv($fp)) {
	$x++;

	$data   = array_combine($headers, $data);
	$digits = Sandstorm\PhoneNumber::normalize($data['Phone Number']);
	$email  = trim($data['E-mail Address']);

	if (!isset($data['Full Name'])) {
		continue;
	}

	if ($number = $numbers->findOneByDigits($digits)) {
		$person = $number->getPerson() ?: $people->create();
	} elseif ($person = $people->findOneByEmailAddress($email)) {
		$number = $people->getPrimaryPhoneNumber() ?: $numbers->create();
	} else {
		echo 'No contact method defined for record ' . $x . ', skipping.';
		continue;
	}

	$person->setNickName($data['First Name']);
	$person->setFullName($data['Full Name']);
	$person->setEmailAddress($data['E-mail Address']);
	$person->setAddressLine1($data['Address']);
	$person->setAddressLine2($data['Address (Cont)']);
	$person->setCity($data['City']);
	$person->setState($data['State']);
	$person->setPostalCode($data['Postal Code']);

	$number->setPerson($person);
	$number->setDigits($digits);

	$interests = $person->getInterests();

	if ($data['Canvass'] == 'Yes' && !$interests->contains($canvass)) {
		$interests->add($canvass);
	}

	if ($data['Phone Bank'] == 'Yes' && !$interests->contains($bank)) {
		$interests->add($bank);
	}

	if ($data['Voter Reg.'] == 'Yes' && !$interests->contains($vreg)) {
		$interests->add($vreg);
	}

	if ($data['Table'] == 'Yes' && !$interests->contains($table)) {
		$interests->add($table);
	}

	$person->store();
	$number->store();
}

$app['entity.manager']->flush();
