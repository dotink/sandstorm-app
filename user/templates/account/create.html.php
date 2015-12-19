<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<form class="profile" method="post" action="/create">
			<?php if ($this('allow')) { ?>
				<label>
					Nickname:
					<input type="text" name="nickName" value="<?= $this('person.nickName') ?>" required />
				</label>

				<label>
					Full Name:
					<input type="text" name="name" value="<?= $this('person.name') ?>" />
				</label>

				<label>
					E-mail address:
					<input type="text" name="emailAddress" value="<?= $this('person.emailAddress') ?>" />
				</label>

				<label>
					Phone Number:
					<input type="text" name="phoneNumbers[1][digits]" value="<?= $this('phoneNumber.1.digits') ?>" />
				</label>

				<label>
					Postal Code:
					<input type="text" name="postalCode" value="<?= $this('person.postalCode') ?>" required />
				</label>

				<?php if (count($this('action_types'))) { ?>
					<fieldset>
						<legend>What are they volunteering for?</legend>
						<input type="hidden" name="interests" value="" />
						<?php html::per($this('action_types'), $this(function($i, $type) { ?>
							<label class="option">
								<input type="checkbox" name="interests[]" value="<?= $this('type.id') ?>" <?= $this('person')->hasInterest($type) ? 'checked' : '' ?>/>
								<span><?= $this('type.name') ?></span>
							</label>
						<?php })) ?>
					</fieldset>
				<?php } ?>

				<input type="hidden" name="pass" value="<?= $this('pass') ?>" />

				<button type="submit" name="action" value="create">Save</button>
			<?php } else { ?>
				<label>
					Password:
					<input type="password" name="pass" />
				</label>

				<button type="submit">Login</button>
			<?php } ?>
		</form>
	</section>
