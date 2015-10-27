<?php namespace Sandstorm
{
	use Inkwell\Doctrine\Repository;

	/**
	 *
	 */
	class PhoneNumbers extends Repository
	{
		/**
		 *
		 */
		public function normalize($number)
		{
			$model = $this->model;

			return $model::normalize($number);
		}
	}
}
