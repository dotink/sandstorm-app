<?php

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<form method="post" action="/recover">
			<label>
				Enter your e-mail address to recover your account.
				<input type="email" name="email" required />
			</label>
			<div class="message notice">
				<p>
					We will send you an e-mail to reset your mobile number.
				</p>
			</div>
			<button type="submit">Recover</button>
		</form>
	</section>
