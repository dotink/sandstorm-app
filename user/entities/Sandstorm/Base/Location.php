<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;
	use Sandstorm\Entity;

	class Location extends Entity
	{
		/**
		 * @access protected
		 * @var string
		 */
		protected $addressLine1;

		/**
		 * @access protected
		 * @var string
		 */
		protected $addressLine2;

		/**
		 * @access protected
		 * @var integer
		 */
		protected $capacity;

		/**
		 * @access protected
		 * @var string
		 */
		protected $city;

		/**
		 * @access protected
		 * @var integer
		 */
		protected $id;

		/**
		 * @access protected
		 * @var float
		 */
		protected $latitude;

		/**
		 * @access protected
		 * @var float
		 */
		protected $longitude;

		/**
		 * @access protected
		 * @var string
		 */
		protected $name;

		/**
		 * @access protected
		 * @var string
		 */
		protected $postalCode;

		/**
		 * @access protected
		 * @var string
		 */
		protected $state;


		/**
		 * Instantiate a new Location
		 */
		public function __construct()
		{
		}


		/**
		 * Get the value of addressLine1
		 *
		 * @access public
		 * @return string The value of addressLine1
		 */
		public function getAddressLine1()
		{
			return $this->addressLine1;
		}


		/**
		 * Get the value of addressLine2
		 *
		 * @access public
		 * @return string The value of addressLine2
		 */
		public function getAddressLine2()
		{
			return $this->addressLine2;
		}


		/**
		 * Get the value of capacity
		 *
		 * @access public
		 * @return integer The value of capacity
		 */
		public function getCapacity()
		{
			return $this->capacity;
		}


		/**
		 * Get the value of city
		 *
		 * @access public
		 * @return string The value of city
		 */
		public function getCity()
		{
			return $this->city;
		}


		/**
		 * Get the value of id
		 *
		 * @access public
		 * @return integer The value of id
		 */
		public function getId()
		{
			return $this->id;
		}


		/**
		 * Get the value of latitude
		 *
		 * @access public
		 * @return float The value of latitude
		 */
		public function getLatitude()
		{
			return $this->latitude;
		}


		/**
		 * Get the value of longitude
		 *
		 * @access public
		 * @return float The value of longitude
		 */
		public function getLongitude()
		{
			return $this->longitude;
		}


		/**
		 * Get the value of name
		 *
		 * @access public
		 * @return string The value of name
		 */
		public function getName()
		{
			return $this->name;
		}


		/**
		 * Get the value of postalCode
		 *
		 * @access public
		 * @return string The value of postalCode
		 */
		public function getPostalCode()
		{
			return $this->postalCode;
		}


		/**
		 * Get the value of state
		 *
		 * @access public
		 * @return string The value of state
		 */
		public function getState()
		{
			return $this->state;
		}


		/**
		 * Set the value of addressLine1
		 *
		 * @access public
		 * @param string $value The value to set to addressLine1
		 * @return Location The object instance for method chaining
		 */
		public function setAddressLine1($value)
		{
			$this->addressLine1 = $value;

			return $this;
		}


		/**
		 * Set the value of addressLine2
		 *
		 * @access public
		 * @param string $value The value to set to addressLine2
		 * @return Location The object instance for method chaining
		 */
		public function setAddressLine2($value)
		{
			$this->addressLine2 = $value;

			return $this;
		}


		/**
		 * Set the value of capacity
		 *
		 * @access public
		 * @param integer $value The value to set to capacity
		 * @return Location The object instance for method chaining
		 */
		public function setCapacity($value)
		{
			$this->capacity = $value;

			return $this;
		}


		/**
		 * Set the value of city
		 *
		 * @access public
		 * @param string $value The value to set to city
		 * @return Location The object instance for method chaining
		 */
		public function setCity($value)
		{
			$this->city = $value;

			return $this;
		}


		/**
		 * Set the value of id
		 *
		 * @access public
		 * @param integer $value The value to set to id
		 * @return Location The object instance for method chaining
		 */
		public function setId($value)
		{
			$this->id = $value;

			return $this;
		}


		/**
		 * Set the value of latitude
		 *
		 * @access public
		 * @param float $value The value to set to latitude
		 * @return Location The object instance for method chaining
		 */
		public function setLatitude($value)
		{
			$this->latitude = $value;

			return $this;
		}


		/**
		 * Set the value of longitude
		 *
		 * @access public
		 * @param float $value The value to set to longitude
		 * @return Location The object instance for method chaining
		 */
		public function setLongitude($value)
		{
			$this->longitude = $value;

			return $this;
		}


		/**
		 * Set the value of name
		 *
		 * @access public
		 * @param string $value The value to set to name
		 * @return Location The object instance for method chaining
		 */
		public function setName($value)
		{
			$this->name = $value;

			return $this;
		}


		/**
		 * Set the value of postalCode
		 *
		 * @access public
		 * @param string $value The value to set to postalCode
		 * @return Location The object instance for method chaining
		 */
		public function setPostalCode($value)
		{
			$this->postalCode = $value;

			return $this;
		}


		/**
		 * Set the value of state
		 *
		 * @access public
		 * @param string $value The value to set to state
		 * @return Location The object instance for method chaining
		 */
		public function setState($value)
		{
			$this->state = $value;

			return $this;
		}

	}

}
