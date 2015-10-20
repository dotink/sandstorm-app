<?php

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<form>
			<legend>Tell us a little bit about yourself</legend>


			<label>
				What should we call you?
				<input type="text" name="nickName" />
			</label>

			<label>
				What's your full name?
				<input type="text" name="name" />
			</label>

			<label>
				E-mail address:
				<input type="text" name="email" />
			</label>

			<label>
				Postal Code:
				<input type="text" name="postalCode" />
			</label>

			<!-- replace with button -->
			<a class="action" href="/dashboard/">Save</a>
		</form>
	</section>
