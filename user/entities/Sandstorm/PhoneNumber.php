<?php namespace Sandstorm {

	use iMarc\Auth;
	use Tenet\AccessInterface;
	use Tenet\Access\AccessibleTrait;

	/**
	 *
	 */
	class PhoneNumber extends Base\PhoneNumber implements Auth\EntityInterface, AccessInterface
	{
		use AccessibleTrait;

		/**
		 * Instantiate a new PhoneNumber
		 */
		public function __construct()
		{
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
				return [];
			}

			return array_map(function($role) {
				return $role->getName();
			}, $this->getPerson()->getRoles()->toArray());
		}

	}

}
