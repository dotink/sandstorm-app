<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Create an Organization</h1>
		<form class="entity organization" method="post" action="/organizations/?action=add">
			<label>
				Name
				<input type="text" name="name" value="<?= $this('organization.name') ?>" required />
			</label>
			<label>
				Description
				<textarea name="description" cols="60" rows="15" required><?= $this('organization.description') ?></textarea>
			</label>
			<button type="submit">Save</button>
		</form>
	</section>
