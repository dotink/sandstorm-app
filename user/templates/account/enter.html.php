<?php

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<form method="post" action="/">
			<label>
				Enter your mobile number to log in to access your dashboard
				<input type="tel" name="number" required />
			</label>
			<div class="message notice">
				<p>
					We will send you a text containing your login code.  <em>Note: standard text message charges may apply</em>
				</p>
			</div>
			<button type="submit">Begin</button>
			<p class="alt">
				<a href="/login">I already have a code I didn't use</a>
			</p>
		</form>
	</section>
