<?php namespace Inkwell\HTML
{
	class md
	{
		/**
		 *
		 */
		public function __construct($parser)
		{
			$this->parser = $parser;
		}


		/**
		 *
		 */
		public function __invoke($data)
		{
			return is_string($data)
				? html::raw($this->parser->parse($data), ['md', 'esc', 'raw'])
				: $data;
		}
	}
}
