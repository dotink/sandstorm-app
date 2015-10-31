<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;
	use Sandstorm\Entity;

	class Expense extends Entity
	{
		/**
		 * @access protected
		 * @var Sandstorm\Account
		 */
		protected $account;

		/**
		 * @access protected
		 * @var Sandstorm\Action
		 */
		protected $action;

		/**
		 * @access protected
		 * @var float
		 */
		protected $amount;

		/**
		 * @access protected
		 * @var boolean
		 */
		protected $closed;

		/**
		 * @access protected
		 * @var \DateTime
		 */
		protected $dateReported;

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
		 * @var Sandstorm\Person
		 */
		protected $organizer;

		/**
		 * @access protected
		 * @var ArrayCollection
		 */
		protected $payments;


		/**
		 * Instantiate a new Expense
		 */
		public function __construct()
		{
			$this->payments = new ArrayCollection();
		}


		/**
		 * Get the value of account
		 *
		 * @access public
		 * @return Sandstorm\Account The value of account
		 */
		public function getAccount()
		{
			return $this->account;
		}


		/**
		 * Get the value of action
		 *
		 * @access public
		 * @return Sandstorm\Action The value of action
		 */
		public function getAction()
		{
			return $this->action;
		}


		/**
		 * Get the value of amount
		 *
		 * @access public
		 * @return float The value of amount
		 */
		public function getAmount()
		{
			return $this->amount;
		}


		/**
		 * Get the value of closed
		 *
		 * @access public
		 * @return boolean The value of closed
		 */
		public function getClosed()
		{
			return $this->closed;
		}


		/**
		 * Get the value of dateReported
		 *
		 * @access public
		 * @return \DateTime The value of dateReported
		 */
		public function getDateReported()
		{
			return $this->dateReported;
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
		 * Get the value of organizer
		 *
		 * @access public
		 * @return Sandstorm\Person The value of organizer
		 */
		public function getOrganizer()
		{
			return $this->organizer;
		}


		/**
		 * Get the value of payments
		 *
		 * @access public
		 * @return ArrayCollection The value of payments
		 */
		public function getPayments()
		{
			return $this->payments;
		}


		/**
		 * Set the value of account
		 *
		 * @access public
		 * @param Sandstorm\Account $value The value to set to account
		 * @return Expense The object instance for method chaining
		 */
		public function setAccount(\Sandstorm\Account $value)
		{
			$this->account = $value;

			return $this;
		}


		/**
		 * Set the value of action
		 *
		 * @access public
		 * @param Sandstorm\Action $value The value to set to action
		 * @return Expense The object instance for method chaining
		 */
		public function setAction(\Sandstorm\Action $value)
		{
			$this->action = $value;

			return $this;
		}


		/**
		 * Set the value of amount
		 *
		 * @access public
		 * @param float $value The value to set to amount
		 * @return Expense The object instance for method chaining
		 */
		public function setAmount($value)
		{
			$this->amount = $value;

			return $this;
		}


		/**
		 * Set the value of closed
		 *
		 * @access public
		 * @param boolean $value The value to set to closed
		 * @return Expense The object instance for method chaining
		 */
		public function setClosed($value)
		{
			$this->closed = $value;

			return $this;
		}


		/**
		 * Set the value of dateReported
		 *
		 * @access public
		 * @param \DateTime $value The value to set to dateReported
		 * @return Expense The object instance for method chaining
		 */
		public function setDateReported($value)
		{
			$this->dateReported = $value;

			return $this;
		}


		/**
		 * Set the value of description
		 *
		 * @access public
		 * @param string $value The value to set to description
		 * @return Expense The object instance for method chaining
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
		 * @return Expense The object instance for method chaining
		 */
		public function setId($value)
		{
			$this->id = $value;

			return $this;
		}


		/**
		 * Set the value of organizer
		 *
		 * @access public
		 * @param Sandstorm\Person $value The value to set to organizer
		 * @return Expense The object instance for method chaining
		 */
		public function setOrganizer(\Sandstorm\Person $value)
		{
			$this->organizer = $value;

			return $this;
		}

	}

}
