<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1><?= $this('location.name') ?></h1>
		<p class="address">
			<?= $this('location.addressLine1') ?><br />
			<?php if ($this('location.addressLine2')) { ?>
				<?= $this('location.addressLine2') ?><br />
			<?php } ?>
			<span class="city"><?= $this('location.city') ?></span>,
			<span class="state"><?= $this('location.state') ?></span>
			<span class="postal_code"><?= $this('location.postalCode') ?></span>
		</p>
		<a class="action" href="/actions/?action=add&amp;location=<?= $this('location.id') ?>">Create Action</a>
	</section>
