<?php namespace Inkwell\HTML; ?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title><?= $this('title') ?: 'Welcome to SandStorm' ?></title>
		<link rel="stylesheet" href="/styles/inkling/inkling.css" />
		<link rel="stylesheet" href="/styles/main.css" />
	</head>
	<body>
		<header>
			<img src="/images/logo.png" class="branding" />
		</header>
		<?php if ($this('messenger')) { ?>
			<div class="messages">
				<?php
					foreach(['notice', 'success', 'error'] as $message) {
						if ($message = $this('messenger')->retrieve($message)) {
							?>
							<div class="message <?= $message->name ?>">
								<?= $message->content ?>
							</div>
							<?php
						}
					}
				?>
			</div>
		<?php } ?>
		<?php $this->insert('content') ?>
		<footer>
		</footer>
	</body>
</html>
