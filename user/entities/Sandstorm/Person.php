<?php namespace Sandstorm
{
	use DateTime;
	use Tenet\AccessInterface;
	use Tenet\Access\AccessibleTrait;

	/**
	 *
	 */
	class Person extends Base\Person implements Addressable
	{
		/**
		 * Instantiate a new Person
		 */
		public function __construct()
		{
			$this->dateJoined = new DateTime();

			return parent::__construct();
		}


		/**
		 *
		 */
		public function hasInterest(ActionType $action_type)
		{
			return $this->getInterests()->contains($action_type);
		}


		/**
		 *
		 */
		public function makeLocation()
		{
			$location  = $this->getAddressLine1();
			$location .= ' ' . $this->getAddressLine2();

			if ($this->getCity()) {
				$location .= ', ' . $this->getCity();
			}

			if ($this->getState()) {
				$location .= ', ' .  $this->getState();
			}

			$location .= ' ' . $this->getPostalCode();

			return trim($location);
		}


		/**
		 *
		 */
		public function setEmailAddress($email_address)
		{
			parent::setEmailAddress(strtolower($email_address));
		}
	}
}
