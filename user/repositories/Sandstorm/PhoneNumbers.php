<?php namespace Sandstorm {

	use Inkwell\Doctrine\Repository;

	class PhoneNumbers extends Repository
	{
		const MODEL = 'Sandstorm\PhoneNumber';

		/**
		 *
		 */
		static public function normalize($number)
		{
			$model = static::MODEL;

			return $model::normalize($number);
		}
	}

}
