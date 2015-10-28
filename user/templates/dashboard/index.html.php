<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Welcome <?= $this('person.nickName') ?></h1>
		<p>
			Thanks for signing up with Sandstorm.  Sandstorm is a way for organizers to easily and
			effectively coordinate volunteer efforts.  We're still in the process of developing
			more features, so make sure you check back for updates.
		</p>

		<!-- if actions
			<h2>Your Actions</h2>

			<div class="action">
				<h3>Mountain View Farmer's Market Tabling</h3>
				<div class="meta">
					<span class="type">Tabling</span>
					<span class="date time">October 18th @ 9:00am</span>
					<span class="location">
						<a href="http://maps.google.com?q=">Mountain View, CA</a>
					</span>
				</div>
				<a class="action" href="/actions/example">View</a>
			</div>
		<!-- endif -->
	</section>
