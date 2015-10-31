<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Find Location</h1>
		<p>
			You can select from the existing locations below.  Please keep in mind that you need to settle any permissions, permits, reservations, etc, in advance.
		</p>
		<form class="entity action" method="get" action="/actions/">
			<?php if (count($this('locations'))) { ?>
				<?php html::per($this('locations'), $this(function($i, $location) { ?>
					<label>
						<?= $this('location.name') ?>
						<input type="radio" name="location" value="<?= $this('location.id') ?>" />
					</label>
				<?php })) ?>

				<input type="hidden" name="action" value="add" />
				<button type="submit">Create Action Here</button>

			<?php } else { ?>
				<div class="message notice">
					<p>There are currenty no existing locations in this area.</p>
				</div>
			<?php } ?>

			<a class="action" href="/locations/?action=add">Create a New Location</a>
		</form>
	</section>
