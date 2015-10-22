<?php

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<form method="post" action="login">

			<?php if ($this('number')) { ?>
				<div class="message success">
					<p>You should receive a text with your login phrase momentarily.</p>
				</div>
				<input type="hidden" name="number" value="<?= $this('number') ?>" />
			<?php } else { ?>
				<label>
					Enter your phone number
					<input type="text" name="number" />
				</label>
			<?php } ?>

			<label>
				Enter your login phrase
				<input type="text" name="phrase" />
			</label>
			<!-- replace with button -->
			<button type="submit">Login</button>
		</form>
	</section>
