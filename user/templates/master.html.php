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
			<?php if ($this('auth') && $this('auth')->is('user')) { ?>
				<nav>
					<ul>
						<li><a href="/profile">Your Profile</a></li>
						<?php if ($this('auth')->can('create', 'Sandstorm\Action')) { ?>
							<li><a href="/user/actions/">Actions</a></li>
						<?php } ?>
						<?php if ($this('auth')->can('create', 'Sandstorm\Organization')) { ?>
							<li><a href="/user/organizations/">Organizations</a></li>
						<?php } ?>
					</ul>
				</nav>
			<?php } ?>
		</footer>
	</body>
</html>
