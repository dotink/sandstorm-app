<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;

	class PhoneNumber
	{
		/**
		 * @access protected
		 * @var integer
		 */
		protected $id;

		/**
		 * @access protected
		 * @var string
		 */
		protected $digits;

		/**
		 * @access protected
		 * @var string
		 */
		protected $loginPhrase;

		/**
		 * @access protected
		 * @var string
		 */
		protected $type;

		/**
		 * @access protected
		 * @var Sandstorm\Person
		 */
		protected $person;


		/**
		 * Instantiate a new PhoneNumber
		 */
		public function __construct()
		{
		}


		/**
		 * Get the value of digits
		 *
		 * @access public
		 * @return string The value of digits
		 */
		public function getDigits()
		{
			return $this->digits;
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
		 * Get the value of loginPhrase
		 *
		 * @access public
		 * @return string The value of loginPhrase
		 */
		public function getLoginPhrase()
		{
			return $this->loginPhrase;
		}


		/**
		 * Get the value of person
		 *
		 * @access public
		 * @return Sandstorm\Person The value of person
		 */
		public function getPerson()
		{
			return $this->person;
		}


		/**
		 * Get the value of type
		 *
		 * @access public
		 * @return string The value of type
		 */
		public function getType()
		{
			return $this->type;
		}


		/**
		 * Set the value of digits
		 *
		 * @access public
		 * @param string $value The value to set to digits
		 * @return PhoneNumber The object instance for method chaining
		 */
		public function setDigits($value)
		{
			$this->digits = $value;

			return $this;
		}


		/**
		 * Set the value of id
		 *
		 * @access public
		 * @param integer $value The value to set to id
		 * @return PhoneNumber The object instance for method chaining
		 */
		public function setId($value)
		{
			$this->id = $value;

			return $this;
		}


		/**
		 * Set the value of loginPhrase
		 *
		 * @access public
		 * @param string $value The value to set to loginPhrase
		 * @return PhoneNumber The object instance for method chaining
		 */
		public function setLoginPhrase($value)
		{
			$this->loginPhrase = $value;

			return $this;
		}


		/**
		 * Set the value of type
		 *
		 * @access public
		 * @param string $value The value to set to type
		 * @return PhoneNumber The object instance for method chaining
		 */
		public function setType($value)
		{
			$this->type = $value;

			return $this;
		}

	}

}
