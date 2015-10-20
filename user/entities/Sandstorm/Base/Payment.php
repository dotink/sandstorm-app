<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;

	class Payment
	{
		/**
		 * @access protected
		 * @var string
		 */
		protected $id;

		/**
		 * @access protected
		 * @var \DateTime
		 */
		protected $datePosted;

		/**
		 * @access protected
		 * @var float
		 */
		protected $amount;

		/**
		 * @access protected
		 * @var Sandstorm\Deposit
		 */
		protected $deposit;

		/**
		 * @access protected
		 * @var Sandstorm\Expense
		 */
		protected $expense;


		/**
		 * Instantiate a new Payment
		 */
		public function __construct()
		{
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
		 * Get the value of datePosted
		 *
		 * @access public
		 * @return \DateTime The value of datePosted
		 */
		public function getDatePosted()
		{
			return $this->datePosted;
		}


		/**
		 * Get the value of deposit
		 *
		 * @access public
		 * @return Sandstorm\Deposit The value of deposit
		 */
		public function getDeposit()
		{
			return $this->deposit;
		}


		/**
		 * Get the value of expense
		 *
		 * @access public
		 * @return Sandstorm\Expense The value of expense
		 */
		public function getExpense()
		{
			return $this->expense;
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
		 * Set the value of amount
		 *
		 * @access public
		 * @param float $value The value to set to amount
		 * @return Payment The object instance for method chaining
		 */
		public function setAmount($value)
		{
			$this->amount = $value;

			return $this;
		}


		/**
		 * Set the value of datePosted
		 *
		 * @access public
		 * @param \DateTime $value The value to set to datePosted
		 * @return Payment The object instance for method chaining
		 */
		public function setDatePosted($value)
		{
			$this->datePosted = $value;

			return $this;
		}


		/**
		 * Set the value of id
		 *
		 * @access public
		 * @param string $value The value to set to id
		 * @return Payment The object instance for method chaining
		 */
		public function setId($value)
		{
			$this->id = $value;

			return $this;
		}

	}

}
