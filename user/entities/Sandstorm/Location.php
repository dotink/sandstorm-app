<?php namespace Sandstorm
{
	class Location extends Base\Location implements Addressable
	{
		/**
		 * Instantiate a new Location
		 */
		public function __construct()
		{
			return parent::__construct();
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
	}
}
