<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Edit <?= $this('organization.name') ?></h1>
		<form class="entity organization" method="post">
			<?php $this->inject('organizations/fields.html') ?>
			<button type="submit">Save</button>
		</form>
	</section>
