<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Find Organizations</h1>
		<form>
			<label>
				Keyword
				<input type="query" value="<?= $this('query') ?>" placeholder="e.g. silicon valley" />
			</label>
			<button type="submit" name="action" value="find">Search</button>
		</form>

		<div class="recent">
			<h2>Recently Created Organizations</h2>
			<ul>
				<?php html::per($this('recent_organizations'), $this(function($i, $organization) { ?>
					<li>
						<a href="<?=
							html::anchor('./[id]-[ws:name]', [
								'id'   => $organization->getId(),
								'name' => $organization->getName()
							])
							?>"
						><?= $this('organization.name') ?></a></li>
				<?php })) ?>
			</ul>
		</div>
	</section>
