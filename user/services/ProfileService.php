<?php namespace Sandstorm
{
	use Inkwell\Auth;
	use Tenet\Accessor;

	/**
	 *
	 */
	class ProfileService implements Auth\ConsumerInterface
	{
		use Auth\StandardConsumer;

		/**
		 *
		 */
		public function __construct(People $people, ActionTypes $action_types, Accessor $accessor)
		{
			$this->people      = $people;
			$this->actionTypes = $action_types;
			$this->accessor    = $accessor;
		}


		/**
		 *
		 */
		public function getActionTypes()
		{
			return $this->actionTypes->findAll();
		}


		/**
		 *
		 */
		public function getPerson()
		{
			return $this->auth->entity->getPerson()
				?: $this->people->create();
		}


		/**
		 *
		 */
		public function update($data)
		{
			 $person = $this->getPerson();

			 $this->accessor->fill($person, $data);
			 $this->accessor->fill($this->auth->entity, ['person' => $person]);

			 $this->people->save($person);
		}
	}
}
