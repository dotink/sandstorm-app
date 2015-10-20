<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;

	class Account
	{
		/**
		 * @access protected
		 * @var string
		 */
		protected $id;

		/**
		 * @access protected
		 * @var string
		 */
		protected $name;

		/**
		 * @access protected
		 * @var ArrayCollection
		 */
		protected $deposits;

		/**
		 * @access protected
		 * @var ArrayCollection
		 */
		protected $expenses;

		/**
		 * @access protected
		 * @var Sandstorm\Organization
		 */
		protected $organization;


		/**
		 * Instantiate a new Account
		 */
		public function __construct()
		{
			$this->deposits = new ArrayCollection();
			$this->expenses = new ArrayCollection();
		}


		/**
		 * Get the value of deposits
		 *
		 * @access public
		 * @return ArrayCollection The value of deposits
		 */
		public function getDeposits()
		{
			return $this->deposits;
		}


		/**
		 * Get the value of expenses
		 *
		 * @access public
		 * @return ArrayCollection The value of expenses
		 */
		public function getExpenses()
		{
			return $this->expenses;
		}


		/**
		 * Get the value of id
		 *
		 * @access public
		 * @return string The value of id
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
		 * Get the value of organization
		 *
		 * @access public
		 * @return Sandstorm\Organization The value of organization
		 */
		public function getOrganization()
		{
			return $this->organization;
		}


		/**
		 * Set the value of id
		 *
		 * @access public
		 * @param string $value The value to set to id
		 * @return Account The object instance for method chaining
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
		 * @return Account The object instance for method chaining
		 */
		public function setName($value)
		{
			$this->name = $value;

			return $this;
		}

	}

}
