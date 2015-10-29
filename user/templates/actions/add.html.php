<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Create an Action</h1>
		<form class="entity action" method="post" action="/actions/?action=add">
			<label>
				Name
				<input type="text" name="name" value="<?= $this('action.name') ?>" required />
			</label>

			<label>
				Organization
				<select name="organization" required>
					<option value="" disabled <?= $this('action.organization') ? '' : 'selected' ?>>Choose an Organization</option>
					<?php html::per($this('person.organizations'), $this(function($i, $organization) { ?>
						<option value="<?= $this('organization.id') ?>" <?= $this('action.organization') === $organization ? 'selected' : '' ?>>
							<?= $this('organization.name') ?>
						</option>
					<?php })) ?>
				</select>
			</label>

			<label>
				Type
				<select name="type" required>
					<option value="" disabled <?= $this('action.type') ? '' : 'selected' ?>>Choose an Action Type</option>
					<?php html::per($this('action_types'), $this(function($i, $action_type) { ?>
						<option value="<?= $this('action_type.id') ?>" <?= $this('action.type') === $action_type ? 'selected' : '' ?>>
							<?= $this('action_type.name') ?>
						</option>
					<?php })) ?>
				</select>
			</label>

			<fieldset class="range group">
				<legend>Set the dates and times your action will begin and end</legend>
				<label>
					Start Date
					<input type="date" name="startDate" value="<?= $this('action.startDate') ?>" required />
				</label>
				<label>
					Start Time
					<input type="time" name="startTime" value="<?= $this('action.startTime') ?>" required />
				</label>
				<label>
					End Date
					<input type="date" name="endDate" value="<?= $this('action.endDate') ?>" required />
				</label>
				<label>
					End Time
					<input type="time" name="endTime" value="<?= $this('action.endTime') ?>" required />
				</label>
			</fieldset>

			<label>
				Description
				<textarea name="description" cols="60" rows="15" required><?= $this('action.description') ?></textarea>
			</label>

			<button type="submit">Save</button>
		</form>
	</section>
