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
		public function setOwner(Person $person)
		{
			$this->owner = $person;

			if (!$person->getOrganizations()->contains($this)) {
				$person->getOrganizations()->add($this);
			}
		}
	}
}
