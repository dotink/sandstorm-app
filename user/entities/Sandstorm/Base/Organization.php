<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;
	use Sandstorm\Entity;

	class Organization extends Entity
	{
		/**
		 * @access protected
		 * @var \DateTime
		 */
		protected $dateCreated;

		/**
		 * @access protected
		 * @var string
		 */
		protected $description;

		/**
		 * @access protected
		 * @var integer
		 */
		protected $id;

		/**
		 * @access protected
		 * @var ArrayCollection
		 */
		protected $leaders;

		/**
		 * @access protected
		 * @var string
		 */
		protected $name;

		/**
		 * @access protected
		 * @var Sandstorm\Person
		 */
		protected $owner;

		/**
		 * @access protected
		 * @var Sandstorm\Account
		 */
		protected $primaryAccount;


		/**
		 * Instantiate a new Organization
		 */
		public function __construct()
		{
			$this->leaders = new ArrayCollection();
		}


		/**
		 * Get the value of dateCreated
		 *
		 * @access public
		 * @return \DateTime The value of dateCreated
		 */
		public function getDateCreated()
		{
			return $this->dateCreated;
		}


		/**
		 * Get the value of description
		 *
		 * @access public
		 * @return string The value of description
		 */
		public function getDescription()
		{
			return $this->description;
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
		 * Get the value of leaders
		 *
		 * @access public
		 * @return ArrayCollection The value of leaders
		 */
		public function getLeaders()
		{
			return $this->leaders;
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
		 * Get the value of owner
		 *
		 * @access public
		 * @return Sandstorm\Person The value of owner
		 */
		public function getOwner()
		{
			return $this->owner;
		}


		/**
		 * Get the value of primaryAccount
		 *
		 * @access public
		 * @return Sandstorm\Account The value of primaryAccount
		 */
		public function getPrimaryAccount()
		{
			return $this->primaryAccount;
		}


		/**
		 * Set the value of dateCreated
		 *
		 * @access public
		 * @param \DateTime $value The value to set to dateCreated
		 * @return Organization The object instance for method chaining
		 */
		public function setDateCreated($value)
		{
			$this->dateCreated = $value;

			return $this;
		}


		/**
		 * Set the value of description
		 *
		 * @access public
		 * @param string $value The value to set to description
		 * @return Organization The object instance for method chaining
		 */
		public function setDescription($value)
		{
			$this->description = $value;

			return $this;
		}


		/**
		 * Set the value of id
		 *
		 * @access public
		 * @param integer $value The value to set to id
		 * @return Organization The object instance for method chaining
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
		 * @return Organization The object instance for method chaining
		 */
		public function setName($value)
		{
			$this->name = $value;

			return $this;
		}


		/**
		 * Set the value of owner
		 *
		 * @access public
		 * @param Sandstorm\Person $value The value to set to owner
		 * @return Organization The object instance for method chaining
		 */
		public function setOwner(\Sandstorm\Person $value)
		{
			$this->owner = $value;

			return $this;
		}


		/**
		 * Set the value of primaryAccount
		 *
		 * @access public
		 * @param Sandstorm\Account $value The value to set to primaryAccount
		 * @return Organization The object instance for method chaining
		 */
		public function setPrimaryAccount(\Sandstorm\Account $value)
		{
			$this->primaryAccount = $value;

			return $this;
		}

	}

}
