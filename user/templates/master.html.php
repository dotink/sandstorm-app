<?php namespace Inkwell\HTML; ?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?= $this('title') ?: 'Welcome to SandStorm' ?></title>
		<link rel="stylesheet" href="/styles/inkling/inkling.css" />
		<link rel="stylesheet" href="/styles/main.css" />
	</head>
	<body>
		<header>
		</header>
		<?php $this->insert('content') ?>
		<footer>
		</footer>
	</body>
</html>
