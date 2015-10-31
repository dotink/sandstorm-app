<?php namespace Sandstorm
{
	interface Addressable
	{
		public function getCity();
		public function getState();
		public function getLatitude();
		public function getLongitude();
		public function makeLocation();
		public function setCity($city);
		public function setState($state);
		public function setLatitude($latitude);
		public function setLongitude($longitude);
	}
}
