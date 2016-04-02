<?php namespace Sandstorm\Security
{
	use Inkwell\Core as App;
	use Sandstorm\People;
	use Sandstorm\Mailer;
	use Dotink\Flourish;

	/**
	 *
	 *
	 */
	class Recovery
	{
		/**
		 *
		 */
		public function __construct(App $app, People $people, Tokenizer $tokenizer, Mailer $mailer)
		{
			$this->app       = $app;
			$this->people    = $people;
			$this->tokenizer = $tokenizer;
			$this->mailer    = $mailer;
		}


		/**
		 *
		 */
		public function sendEmail($email)
		{
			$email = strtolower($email);

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				throw new Flourish\ValidationException('The e-mail address was invalid');
			}

			if (!$person = $this->people->findOneByEmailAddress($email)) {
				throw new Flourish\NotFoundException('Could not find a person with that e-mail');
			}

			var_dump($this->tokenizer->encode('test')); exit();

		}
	}
}
