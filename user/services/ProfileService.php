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
		public function create($data)
		{
			 $person = $this->getPerson();

			 foreach ($data['phoneNumbers'] as $i => $phone_number_data) {
				 if (!$phone_number_data['digits']) {
					 unset($data['phoneNumbers'][$i]);
				 }
			 }

			 $this->accessor->fill($person, $data);
			 $this->accessor->fill($person, ['person' => $person]);

			 $this->people->save($person);
		}


		/**
		 *
		 */
		public function getPerson()
		{
			$anonymous = $this->auth->entity instanceof Auth\AnonymousUser;

			return !$anonymous && $this->auth->entity->getPerson()
				? $this->auth->entity->getPerson()
				: $this->people->create();
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
