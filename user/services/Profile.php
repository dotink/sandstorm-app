<?php namespace Sandstorm
{
	use Inkwell\Auth;
	use Tenet\Accessor;
	use Dotink\Flourish;

	/**
	 *
	 */
	class Profile implements Auth\ConsumerInterface
	{
		use Auth\StandardConsumer;

		/**
		 *
		 */
		protected $person = NULL;


		/**
		 *
		 */
		public function __construct(
			People $people,
			PhoneNumbers $phone_numbers,
			PersonTypes $person_types,
			ActionTypes $action_types,
			Accessor $accessor
		) {
			$this->people       = $people;
			$this->actionTypes  = $action_types;
			$this->personTypes  = $person_types;
			$this->phoneNumbers = $phone_numbers;
			$this->accessor     = $accessor;
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
			$person    = $this->getPerson();
			$user_role = $this->personTypes->findOneByName('user');

			foreach ($data['phoneNumbers'] as $i => $phone_number_data) {
				if (!$phone_number_data['digits']) {
					unset($data['phoneNumbers'][$i]);
				}
			}

			$this->accessor->fill($person, $data);
			$this->accessor->fill($person, ['person' => $person]);

			if ($this->people->findOneBy(['emailAddress' => $person->getEmailAddress()])) {
				throw new Flourish\ValidationException(
					'A person with that e-mail already exists, please skip!'
				);
			}

			$first_number = $person->getPhoneNumbers()->first();

			if ($first_number && $this->phoneNumbers->findOneBy(['digits' => $first_number->getDigits()])) {
				throw new Flourish\ValidationException(
					'A person with phone number already exists, please skip!'
				);
			}

			if (!$person->getRoles()->contains($user_role)) {
				$person->getRoles()->add($user_role);
			}

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
		public function exists()
		{
			$person = $this->getPerson();

			return $this->people->isPersisted($person);
		}


		/**
		 *
		 */
		public function update($data)
		{
			$person    = $this->getPerson();
			$user_role = $this->personTypes->findOneByName('user');

			$this->accessor->fill($person, $data);
			$this->accessor->fill($this->auth->entity, ['person' => $person]);

			if (!$person->getRoles()->contains($user_role)) {
				$person->getRoles()->add($user_role);
			}

			$this->people->save($person);
		}
	}
}
