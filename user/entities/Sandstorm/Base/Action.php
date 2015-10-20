<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;

	class Action
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
		 * @access protected
		 * @var string
		 */
		protected $description;

		/**
		 * @access protected
		 * @var ArrayCollection
		 */
		protected $contributions;

		/**
		 * @access protected
		 * @var ArrayCollection
		 */
		protected $costs;

		/**
		 * @access protected
		 * @var Sandstorm\ActionType
		 */
		protected $type;

		/**
		 * @access protected
		 * @var Sandstorm\Person
		 */
		protected $leader;

		/**
		 * @access protected
		 * @var Sandstorm\Location
		 */
		protected $location;

		/**
		 * @access protected
		 * @var ArrayCollection
		 */
		protected $volunteers;


		/**
		 * Instantiate a new Action
		 */
		public function __construct()
		{
			$this->contributions = new ArrayCollection();
			$this->costs = new ArrayCollection();
			$this->volunteers = new ArrayCollection();
		}


		/**
		 * Get the value of contributions
		 *
		 * @access public
		 * @return ArrayCollection The value of contributions
		 */
		public function getContributions()
		{
			return $this->contributions;
		}


		/**
		 * Get the value of costs
		 *
		 * @access public
		 * @return ArrayCollection The value of costs
		 */
		public function getCosts()
		{
			return $this->costs;
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
		 * Get the value of leader
		 *
		 * @access public
		 * @return Sandstorm\Person The value of leader
		 */
		public function getLeader()
		{
			return $this->leader;
		}


		/**
		 * Get the value of location
		 *
		 * @access public
		 * @return Sandstorm\Location The value of location
		 */
		public function getLocation()
		{
			return $this->location;
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
		 * Get the value of type
		 *
		 * @access public
		 * @return Sandstorm\ActionType The value of type
		 */
		public function getType()
		{
			return $this->type;
		}


		/**
		 * Get the value of volunteers
		 *
		 * @access public
		 * @return ArrayCollection The value of volunteers
		 */
		public function getVolunteers()
		{
			return $this->volunteers;
		}


		/**
		 * Set the value of description
		 *
		 * @access public
		 * @param string $value The value to set to description
		 * @return Action The object instance for method chaining
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
		 * @return Action The object instance for method chaining
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
		 * @return Action The object instance for method chaining
		 */
		public function setName($value)
		{
			$this->name = $value;

			return $this;
		}

	}

}
