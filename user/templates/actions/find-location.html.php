<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Find Location</h1>
		<div class="message notice">
			<p>
				To create a new action, we begin by getting a location.  Enter the postal code below where your action will take place to browse existing locations.
			</p>
		</div>
		<form class="entity action" method="get" action="/actions/">
			<input type="hidden" name="action" value="add" />

			<label>
				Postal Code
				<input type="text" name="postal_code" required />
			</label>

			<button type="submit">Find Locations</button>
		</form>
	</section>
