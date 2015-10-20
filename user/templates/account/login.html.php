<?php

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<form>
			<label>
				Enter your login phrase
				<input type="text" name="access_code" />
			</label>
			<!-- replace with button -->
			<a class="action" href="/account/profile">Login</a>
		</form>
	</section>
