<?php namespace Sandstorm
{
	class Locator
	{
		/**
		 *
		 */
		protected $geoData = NULL;

		/**
		 *
		 */
		public function locate($location)
		{
			$this->geoData = json_decode(file_get_contents(
				'http://maps.googleapis.com/maps/api/geocode/json?address='
				. urlencode($location)
				. '&sensor=false'
			));
		}

		/**
		 *
		 */
		public function update(Addressable $entity)
		{
			$this->locate($entity->makeLocation());

			if (!isset($this->geoData->results[0])) {
				return FALSE;
			}

			if ($this->geoData->results[0]->geometry->location->lat) {
				$entity->setLongitude($this->geoData->results[0]->geometry->location->lng);
				$entity->setLatitude($this->geoData->results[0]->geometry->location->lat);
			}

			foreach ($this->geoData->results[0]->address_components as $address_component) {
				if (!$entity->getCity() && in_array('locality', $address_component->types)) {
					$entity->setCity($address_component->long_name);
				}

				if (!$entity->getState() && in_array('administrative_area_level_1', $address_component->types)) {
					$entity->setState($address_component->short_name);
				}
			}

			return TRUE;
		}
	}
}
