<?php namespace Sandstorm {

	use Inkwell\Doctrine\Repository;

	class PhoneNumbers extends Repository
	{
		const MODEL = 'Sandstorm\PhoneNumber';

		/**
		 *
		 */
		public function normalize($number)
		{
			return preg_replace('#[^0-9]#', '', $number);
		}
	}

}
