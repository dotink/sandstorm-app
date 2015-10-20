<?php

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Welcome</h1>

		<!-- if actions -->
			<h2>Your Actions</h2>

			<div class="action">
				<h3>Mountain View Farmer's Market Tabling</h3>
				<div class="meta">
					<span class="type">Tabling</span>
					<span class="date time">October 18th @ 9:00am</span>
					<span class="location">
						<a href="http://maps.google.com?q=">Mountain View, CA</a>
					</span> <!-- clickable google maps to exact address -->
				</div>
				<a class="action" href="/actions/example">View</a>
			</div>
		<!-- endif -->
	</section>
