<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<form class="entity profile" method="post" action="/profile">
			<legend>Tell us a little bit about yourself</legend>

			<label>
				What should we call you?
				<input type="text" name="nickName" value="<?= $this('person.nickName') ?>" required />
			</label>

			<label>
				What's your full name?
				<input type="text" name="name" value="<?= $this('person.name') ?>" />
			</label>

			<label>
				What's a good e-mail address?
				<input type="text" name="emailAddress" value="<?= $this('person.emailAddress') ?>" required />
			</label>

			<label>
				What postal/zip code are you in?
				<input type="text" name="postalCode" value="<?= $this('person.postalCode') ?>" required />
			</label>

			<?php if (count($this('action_types'))) { ?>
				<fieldset>
					<legend>As a volunteer, I can...</legend>
					<input type="hidden" name="interests" value="" />
					<?php html::per($this('action_types'), $this(function($i, $type) { ?>
						<label class="option">
							<input type="checkbox" name="interests[]" value="<?= $this('type.id') ?>" <?= $this('person')->hasInterest($type) ? 'checked' : '' ?>/>
							<span><?= $this('type.name') ?></span>
						</label>
					<?php })) ?>
				</fieldset>
			<?php } ?>

			<button type="submit">Save</button>
		</form>
	</section>
