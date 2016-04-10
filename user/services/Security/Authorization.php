<?php namespace Sandstorm\Security
{
	use Inkwell\Event;
	use Inkwell\Auth;
	use Inkwell\Http\Resource\Request;
	use Inkwell\Http\Resource\Response;
	use Inkwell\Core as App;

	use Services_Twilio as Twilio;
	use Services_Twilio_RestException as TwilioException;

	use Sandstorm;
	use Dotink\Flourish;

	/**
	 *
	 *
	 * TODO: This class should be split into two services.  Auth should handle getting a user
	 * authorized, while firewall (separate middleware) should handle request path authorization.
	 * This will prevent us from having to use service locator pattern in checkAccess() with the
	 * $this->app call.
	 *
	 */
	class Authorization implements Event\EmitterInterface
	{
		use Event\Emitter;

		const SESSION_KEY = 'AUTHORIZED_NUMBER';

		/**
		 * A pool of words from which to generate login phrases
		 *
		 * @static
		 * @access protected
		 * @var array
		 */
		static protected $pool = [
			'at',    'to',    'it',    'if',    'on',    'or',    'do',    'go',    'be',
			'hi',    'as',    'me',    'by',    'no',    'so',    'my',    'an',    'up',
			'run',   'see',   'sea',   'bar',   'rap',   'toe',   'jam',   'box',   'cat',
			'dog',   'get',   'vet',   'zoo',   'new',   'tap',   'fat',   'fog',   'day',
			'off',   'sky',   'rot',   'cow',   'map',   'pat',   'and',   'leg',   'eye',
			'ear',   'hog',   'log',   'max',   'nut',   'owl',   'row',   'oil',   'sit',
			'stop',  'word',  'safe',  'jump',  'work',  'fall',  'lift',  'walk',  'test',
			'card',  'copy',  'days',  'dull',  'diet',  'dude',  'figs',  'feed',  'flaw',
			'cool',  'slip',  'tree',  'poor',  'tool',  'sock',  'cork',  'beer',  'food',
			'meal',  'ache',  'acid',  'bash',  'bolt',  'boot',  'bomb',  'burn',  'cube',
			'trees', 'tired', 'phone', 'perch', 'sock',  'pizza', 'party', 'table', 'drink',
			'makes', 'jumpy', 'jimmy', 'junky', 'juicy', 'wimpy', 'kicks', 'major', 'puppy'
		];


		/**
		 *
		 */
		public function __construct(App $app, Twilio $twilio, Sandstorm\PhoneNumbers $phone_numbers)
		{
			$this->app          = $app;
			$this->twilio       = $twilio;
			$this->phoneNumbers = $phone_numbers;
		}


		/**
		 *
		 */
		public function __invoke(Request $request, Response $response, $next = NULL)
		{
			$number = NULL;

			if (isset($_SESSION[static::SESSION_KEY])) {
				$number = $this->phoneNumbers->find($_SESSION[static::SESSION_KEY]);

				if ($number) {
					$number->setLoginPhrase(NULL);
				} else {
					unset($_SESSION[static::SESSION_KEY]);
				}
			}

			$this->app['auth.init']($number ?: new Auth\AnonymousUser());

			return $next($request, $response);
		}


		/**
		 * Initiates a handshake with a given telephone number
		 *
		 * This sends a text to the user and stores their login phrase.
		 *
		 * @param string $number The telephone number to send the login phrase to
		 * @throws Flourish\ConnectivityException if the handshake cannot be initiated
		 * @return void
		 */
		public function handshake($number)
		{
			$digits = $this->phoneNumbers->normalize($number);
			$number = $this->phoneNumbers->findOneByDigits($digits);
			$phrase = $this->generatePhrase();

			if (!$number) {
				$number = $this->phoneNumbers->create();

				$number->setDigits($digits);
			}

			$number->setLoginPhrase($phrase);

			try {
				$message = $this->twilio->account->messages->sendMessage(
					getenv('TWILIO_NUMBER'),
					$number->getDigits(),
				  	sprintf('Your SandStorm login phrase is: %s', $phrase)
				);

			} catch (TwilioException $e) {
				throw new Flourish\ConnectivityException(
					'Problem sending login phrase: ' . $e->getMessage()
				);
			}

			$this->phoneNumbers->save($number);

			return TRUE;
		}


		/**
		 * Log in a number with the given pass phrase
		 *
		 *
		 */
		public function login($number, $phrase)
		{
			$digits = $this->phoneNumbers->normalize($number);
			$number = $this->phoneNumbers->findOneByDigits($digits);

			if ($number && $number->getLoginPhrase() == strtolower($phrase)) {
				$_SESSION[static::SESSION_KEY] = $number->getId();

				$this->app['auth.init']($number);
				$this->emit('auth::init', [
					'auth' => $this->app['auth']
				]);

			} else {
				throw new Flourish\ValidationException(
					'Incorrect number or login passphrase provided'
				);
			}
		}


		/**
		 * Generate a login phrase of variable length
		 *
		 * @access protected
		 * @param integer $length The length, in words, of the login phrase
		 * @return string The login phrase which was generated
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
