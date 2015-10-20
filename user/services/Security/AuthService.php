<?php namespace Sandstorm\Security
{
	use Services_Twilio as Twilio;
	use Sandstorm\PhoneNumbers;

	class AuthService
	{
		/**
		 * A pool of words from which to generate login phrases
		 *
		 * @static
		 * @access protected
		 * @var array
		 */
		static protected $pool = [
			'at',    'to',    'it',    'if',    'on',    'or',    'do',    'go',    'be',
			'hi',
			'run',   'see',   'sea',   'bar',   'rap',   'toe',   'jam',   'box',   'cat',
			'dog',
			'off',   'sky',   'rot',   'cow',   'mop',   'pat',   'and',   'leg',   'eye',
			'ear',
			'stop',  'word',  'safe',  'jump',  'work',  'fall',  'lift',  'walk',  'test',
			'card',
			'cool',  'slip',  'tree',  'poor',  'tool',  'sock',  'cork',  'beer',  'food',
			'meal',
			'trees', 'tired', 'phone', 'perch', 'sock',  'pizza', 'party', 'table', 'drink',
			'makes',
		];

		/**
		 *
		 */
		public function __construct(Twilio $twilio, PhoneNumbers $phone_numbers)
		{
			$this->twilio       = $twilio;
			$this->phoneNumbers = $phone_numbers;
		}


		/**
		 *
		 */
		public function __invoke($request, $response, $next = NULL)
		{
			return $next($request, $response);
		}


		/**
		 * Initiates a handshake with a given telephone number
		 *
		 * This sends a text to the user and stores their login phrase.
		 *
		 * @param string $number The telephone number to send the login phrase to
		 * @return void
		 */
		public function handshake($number)
		{
			$digits = $this->phoneNumbers->normalize($number);
			$number = $this->phoneNumbers->findOneByDigits($digits);
			$phrase = $this->generatePhrase();

			if (!$number) {
				$number = $this->phoneNumbers->create();

				$number->setType('Mobile');
				$number->setDigits($digits);
			}

			$number->setLoginPhrase($phrase);

			$message = $this->twilio->account->messages->sendMessage(
				getenv('TWILIO_NUMBER'),
				$number->getDigits(),
			  	sprintf('Your SandStorm login phrase is: %s', $phrase)
			);

			$this->phoneNumbers->save($number);
		}


		/**
		 *
		 */
		protected function generatePhrase($length = 3)
		{
			$phrase = array();

			for ($x = 0; $x < $length; $x++) {
				$phrase[] = static::$pool[rand(0, count(static::$pool) - 1)];
			}

			return implode(' ', $phrase);
		}
	}
}
