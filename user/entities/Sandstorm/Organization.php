<?php namespace Sandstorm
{
	/**
	 *
	 */
	class Organization extends Base\Organization
	{
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
