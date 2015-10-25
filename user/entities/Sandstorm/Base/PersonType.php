<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;
	use Sandstorm\Entity;

	class PersonType extends Entity
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
		protected $name;


		/**
		 * Instantiate a new PersonType
		 */
		public function __construct()
		{
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
		 * Set the value of id
		 *
		 * @access public
		 * @param integer $value The value to set to id
		 * @return PersonType The object instance for method chaining
		 */
		public function setId($value)
		{
			$this->id = $value;

			return $this;
		}


		/**
		 * Set the value of name
		 *
		 * @access public
		 * @param string $value The value to set to name
		 * @return PersonType The object instance for method chaining
		 */
		public function setName($value)
		{
			$this->name = $value;

			return $this;
		}

	}

}
