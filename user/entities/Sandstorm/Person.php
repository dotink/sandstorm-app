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
		public function isMember(Organization $organization)
		{
			return (
				$organization->getOwner() === $this
				|| $this->getOrganizations()->contains($organization)
			);
		}


		/**
		 *
		 */
		public function joinOrganization(Organization $organization)
		{
			if (!$this->getOrganizations()->contains($organization)) {
				$this->getOrganizations()->add($organization);
			}
		}


		/**
		 *
		 */
		public function leaveOrganization(Organization $organization)
		{
			if ($this === $organization->getOwner()) {
				$organization->removeOwner();
			}

			if ($this->getOrganizations()->contains($organization)) {
				$this->getOrganizations()->removeElement($organization);
			}
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
