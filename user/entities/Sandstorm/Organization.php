<?php namespace Sandstorm
{
	use DateTime;

	/**
	 *
	 */
	class Organization extends Base\Organization
	{
		/**
		 * Instantiate a new Organization
		 */
		public function __construct()
		{
			$this->dateCreated = new DateTime();

			return parent::__construct();
		}


		/**
		 *
		 */
		public function isOwner(Person $person)
		{
			return $this->owner === $person;
		}


		/**
		 *
		 */
		public function removeOwner()
		{
			$this->owner = NULL;
		}


		/**
		 *
		 */
		public function setOwner(Person $person)
		{
			$this->owner = $person;

			if (!$person->getOrganizations()->contains($this)) {
				$person->getOrganizations()->add($this);
			}
		}
	}
}
