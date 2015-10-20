<?php

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<div class="action">
			<h1>Mountain View Farmer's Market</h1>

			<div class="meta">
				<span class="type">Tabling</span>
				<span class="date time">October 18th [- 21st] @ 9:00am [- 1:00pm]</span>
				<p class="location">
					Caltrain Parking Lot<br />
					View and Evelyn<br />
					Mountain View, CA 95117
				</p> <!-- clickable google maps to exact address -->
				<span class="volunteers">
					<!-- if leader -->
						<a href="./volunteers">6 RSVPs</a>
					<!-- else
						6 RSVPs
					<!-- endif -->
			</div>

			<div class="description">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>

			<!-- if not leader
				<a class="action">Cancel RSVP</a>
				<a class="action">Contact Organizer</a>
			<!-- else -->
				<a class="action" href="?action=cancel">Cancel Event</a>
				<a class="action" href="?action=contact">Contact Volunteers</a>
				<a class="action" href="?action=report">Report Contributions</a>
			<!-- endif -->
		</div>
	</section>
