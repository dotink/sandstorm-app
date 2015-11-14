<label>
	Name
	<input type="text" name="name" value="<?= $this('organization.name') ?>" required />
</label>

<label>
	Description
	<textarea name="description" cols="60" rows="15" required><?= $this('organization.description') ?></textarea>
</label>
