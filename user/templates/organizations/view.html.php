<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<div class="organization">
			<h1 class="name"><?= $this('organization.name') ?></h1>
			<div class="description">
				<?= html::md($this('organization.description'))?>
			</div>
			<?php if ($this('user')->isMember($this('organization'))) { ?>
				<?php if ($this('organization')->isOwner($this('user'))) { ?>
					<a class="action" href="?action=edit">Edit Organization</a>
				<?php } ?>
				<a class="action" href="?action=leave">Leave Organization</a>
			<?php } else { ?>
				<a class="action" href="?action=join">Join Organization</a>
			<?php } ?>
		</div>
	</section>
