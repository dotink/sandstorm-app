<?php namespace Sandstorm
{
	use iMarc\Auth;
	use Tenet\AccessInterface;
	use Tenet\Access\AccessibleTrait;

	/**
	 *
	 */
	class PhoneNumber extends Base\PhoneNumber implements Auth\EntityInterface
	{
		/**
		 *
		 */
		static public function normalize($number)
		{
			return preg_replace('#[^0-9]#', '', $number);
		}


		/**
		 * Instantiate a new PhoneNumber
		 */
		public function __construct()
		{
			$this->type = 'Mobile';

			return parent::__construct();
		}


		/**
		 *
		 */
		public function getPermissions()
		{
			return [];
		}


		/**
		 *
		 */
		public function getRoles()
		{
			if (!$this->getPerson()) {
				return ['Anonymous User'];
			}

			return array_map(function($role) {
				return $role->getName();
			}, $this->getPerson()->getRoles()->toArray());
		}


		/**
		 *
		 */
		public function setDigits($number)
		{
			parent::setDigits(static::normalize($number));
		}
	}
}
