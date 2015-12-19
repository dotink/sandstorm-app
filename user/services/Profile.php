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
			Accessor $accessor,
			Locator $locator
		) {
			$this->people       = $people;
			$this->actionTypes  = $action_types;
			$this->personTypes  = $person_types;
			$this->phoneNumbers = $phone_numbers;
			$this->accessor     = $accessor;
			$this->locator      = $locator;
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

			$email_address  = $person->getEmailAddress();
			$primary_number = $person->getPhoneNumbers()->first();

			if ($email_address && $this->people->findOneBy(['emailAddress' => $email_address])) {
				throw new Flourish\ValidationException(
					'A person with that e-mail already exists, please skip!'
				);
			}

			if ($primary_number && $this->phoneNumbers->findOneBy(['digits' => $primary_number->getDigits()])) {
				throw new Flourish\ValidationException(
					'A person with phone number already exists, please skip!'
				);
			}

			if ($user_role && !$person->getRoles()->contains($user_role)) {
				$person->getRoles()->add($user_role);
			}

			$this->updateLocationData($person);
			$this->people->save($person);
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
			$location  = $person->makeLocation();
			$user_role = $this->personTypes->findOneByName('user');

			$this->accessor->fill($person, $data);
			$this->accessor->fill($this->auth->entity, ['person' => $person]);

			if ($user_role && !$person->getRoles()->contains($user_role)) {
				$person->getRoles()->add($user_role);
			}

			if (!$person->getLatitude() || !$person->getLongitude() || $location != $person->makeLocation()) {
				$this->updateLocationData($person);
			}

			$this->people->save($person);
		}


		/**
		 *
		 */
		protected function updateLocationData($person)
		{
			$this->locator->update($person);
		}
	}
}
