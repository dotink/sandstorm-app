<?php namespace Sandstorm\Base {

	use Doctrine\Common\Collections\ArrayCollection;
	use Sandstorm\Entity;

	class Action extends Entity
	{
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
		 * @var string
		 */
		protected $description;

		/**
		 * @access protected
		 * @var \DateTime
		 */
		protected $endDate;

		/**
		 * @access protected
		 * @var \DateTime
		 */
		protected $endTime;

		/**
		 * @access protected
		 * @var integer
		 */
		protected $id;

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
		 * @var string
		 */
		protected $name;

		/**
		 * @access protected
		 * @var Sandstorm\Organization
		 */
		protected $organization;

		/**
		 * @access protected
		 * @var \DateTime
		 */
		protected $startDate;

		/**
		 * @access protected
		 * @var \DateTime
		 */
		protected $startTime;

		/**
		 * @access protected
		 * @var Sandstorm\ActionType
		 */
		protected $type;

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
		 * Get the value of endDate
		 *
		 * @access public
		 * @return \DateTime The value of endDate
		 */
		public function getEndDate()
		{
			return $this->endDate;
		}


		/**
		 * Get the value of endTime
		 *
		 * @access public
		 * @return \DateTime The value of endTime
		 */
		public function getEndTime()
		{
			return $this->endTime;
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
		 * Get the value of startDate
		 *
		 * @access public
		 * @return \DateTime The value of startDate
		 */
		public function getStartDate()
		{
			return $this->startDate;
		}


		/**
		 * Get the value of startTime
		 *
		 * @access public
		 * @return \DateTime The value of startTime
		 */
		public function getStartTime()
		{
			return $this->startTime;
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
		 * Set the value of endDate
		 *
		 * @access public
		 * @param \DateTime $value The value to set to endDate
		 * @return Action The object instance for method chaining
		 */
		public function setEndDate($value)
		{
			$this->endDate = $value;

			return $this;
		}


		/**
		 * Set the value of endTime
		 *
		 * @access public
		 * @param \DateTime $value The value to set to endTime
		 * @return Action The object instance for method chaining
		 */
		public function setEndTime($value)
		{
			$this->endTime = $value;

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
		 * Set the value of leader
		 *
		 * @access public
		 * @param Sandstorm\Person $value The value to set to leader
		 * @return Action The object instance for method chaining
		 */
		public function setLeader(\Sandstorm\Person $value)
		{
			$this->leader = $value;

			return $this;
		}


		/**
		 * Set the value of location
		 *
		 * @access public
		 * @param Sandstorm\Location $value The value to set to location
		 * @return Action The object instance for method chaining
		 */
		public function setLocation(\Sandstorm\Location $value)
		{
			$this->location = $value;

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


		/**
		 * Set the value of organization
		 *
		 * @access public
		 * @param Sandstorm\Organization $value The value to set to organization
		 * @return Action The object instance for method chaining
		 */
		public function setOrganization(\Sandstorm\Organization $value)
		{
			$this->organization = $value;

			return $this;
		}


		/**
		 * Set the value of startDate
		 *
		 * @access public
		 * @param \DateTime $value The value to set to startDate
		 * @return Action The object instance for method chaining
		 */
		public function setStartDate($value)
		{
			$this->startDate = $value;

			return $this;
		}


		/**
		 * Set the value of startTime
		 *
		 * @access public
		 * @param \DateTime $value The value to set to startTime
		 * @return Action The object instance for method chaining
		 */
		public function setStartTime($value)
		{
			$this->startTime = $value;

			return $this;
		}


		/**
		 * Set the value of type
		 *
		 * @access public
		 * @param Sandstorm\ActionType $value The value to set to type
		 * @return Action The object instance for method chaining
		 */
		public function setType(\Sandstorm\ActionType $value)
		{
			$this->type = $value;

			return $this;
		}

	}

}
