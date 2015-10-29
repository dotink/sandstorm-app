<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Actions</h1>
		<?php if (count($this('actions'))) { ?>
			<div class="crud">
				<?php html::per($this('actions'), $this(function($i, $action) { ?>
					<div class="action">
						<h2><?= $this('action.name') ?></h2>
					</div>
				<?php })); ?>
			</div>
		<?php } else { ?>
			<div class="message info">
				You do not currently have any upcoming actions.
			</div>
		<?php } ?>
		<a class="action" href="/actions/">Find Upcoming Actions</a>
		<a class="action" href="/actions/?action=add">Create Your Own</a>
	</section>
