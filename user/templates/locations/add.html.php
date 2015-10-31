<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Create a New Location</h1>
		<form class="entity location" method="post" action="/locations/?action=add">
			<label>
				Name
				<input type="text" name="name" value="<?= $this('location.name') ?>" required />
			</label>

			<label>
				Street Address
				<input type="text" name="addressLine1" value="<?= $this('location.addressLine1') ?>" required />
			</label>

			<label>
				Street Address (continued)
				<input type="text" name="addressLine2" value="<?= $this('location.addressLine2') ?>" />
			</label>

			<label>
				Postal Code
				<input type="text" name="postalCode" value="<?= $this('location.postalCode') ?>" required/>
			</label>

			<label>
				How many people can fit at this location?
				<input type="text" name="capacity" value="<?= $this('location.capacity') ?>" required/>
			</label>

			<button type="submit">Save</button>
		</form>
	</section>
