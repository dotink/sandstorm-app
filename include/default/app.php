<?php

	use Inkwell\HTML;

	return Affinity\Action::create(['html'], function($app, $broker) {
		HTML\html::add([
			'md' => new HTML\md(new cebe\markdown\GithubMarkdown())
		]);
	});
