<?php namespace Inkwell\HTML;

	$this->expand('content', 'master.html');

	?>
	<section role="main">
		<h1>Organizations</h1>
		<?php if (count($this('person.organizations'))) { ?>
			<div class="crud">
				<?php html::per($this('person.organizations'), $this(function($i, $organization) { ?>
					<div class="organization">
						<h2 class="name">
							<a href="<?= html::anchor('/organizations/[id]-[ws:name]', [
								'id'   => $organization->getId(),
								'name' => $organization->getName()
							]) ?>"><?= $this('organization.name') ?></a>
						</h2>
					</div>
				<?php })); ?>
			</div>
		<?php } else { ?>
			<div class="message info">
				You are not currenty a member of any organizations.
			</div>
		<?php } ?>
		<a class="action" href="/organizations/">Find an Organization</a>
		<a class="action" href="/organizations/?action=add">Create an Organization</a>
	</section>
