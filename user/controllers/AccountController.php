<?php namespace Sandstorm
{
	use IW\HTTP;
	use Dotink\Flourish;

	use Sandstorm\Security\Authorization;
	use Sandstorm\Security\Recovery;

	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class AccountController extends Controller
	{
		const MSG_NO_NUMBER     = 'You must enter a telephone number to begin.';
		const MSG_INIT          = 'You should receive a text with your passphrase momentarily.';
		const MSG_PROBLEM       = 'There was a probem trying to send the passphrase.  Try again later.';
		const MSG_INCORRECT     = 'The passphrase you entered was incorrect, please try again.';
		const MSG_THANKS        = 'Thanks, make sure to come back if you need to update your info.';
		const MSG_EMAIL_INVALID = 'That e-mail does not appear to be a valid e-mail, please try again.';
		const MSG_EMAIL_MISSING = 'We could not find that e-mail address in the system, please try again.';
		const MSG_EMAIL_SENT    = 'Please check your e-mail for an account recovery link.';


		/**
		 *
		 * TODO: Remove once a better system is in place
		 */
		public function create(Profile $profile)
		{
			$action = $this->request->params->get('action');
			$pass   = $this->request->params->get('pass');
			$allow  = $pass == getenv('CREATE_PASS');

			if ($this->request->checkMethod(HTTP\POST) && $allow && $action == 'create') {
				$data = $this->request->params->get();

				try {
					$profile->create($data);
					$this->messenger->record('success', 'The contact has been added!');

				} catch (Flourish\ValidationException $e) {
					$this->messenger->record('error', $e->getMessage());
				}
			}

			return $this->view->load('account/create.html', [
				'person'       => $profile->getPerson(),
				'action_types' => $profile->getActionTypes(),
				'allow'        => $allow,
				'pass'         => $pass
			]);
		}


		/**
		 * Entry point to allow the user to initiate a handshake
		 *
		 * This allows the user to post a number and receive a login phrase to be used on the
		 * login page.
		 *
		 * @access public
		 * @param Authorization $authorization The authorization service to use for the handshake
		 * @return View The enter view
		 */
		public function enter(Authorization $authorization)
		{
			if ($this->request->checkMethod(HTTP\POST)) {
				$number = $this->request->params->get('number');

				if (!$number) {
					$this->messenger->record('error', self::MSG_NO_NUMBER);

				} else {
					try {
						$authorization->handshake($number);
						$this->messenger->record('notice', self::MSG_INIT);

						$this->router->redirect('/login?number=' . $number);

					} catch (Flourish\ConnectivityException $e) {
						$this->messenger->record('error', self::MSG_PROBLEM);
					}
				}
			}

			return $this->view->load('account/enter.html');
		}


		/**
		 * Entry point to allow users to log in with a phone number and login phrase
		 *
		 * @access public
		 * @param Authorization $authorization The authorization service
		 * @param Profile $profile The profile service
		 * @return View A login view
		 */
		public function login(Authorization $authorization, Profile $profile)
		{
			$number = $this->request->params->get('number');

			if ($this->request->checkMethod(HTTP\POST)) {
				$phrase = $this->request->params->get('phrase');

				try {
					$authorization->login($number, $phrase);

					if ($profile->exists()) {
						$this->router->redirect('/dashboard');
					} else {
						$this->router->redirect('/profile');
					}

				} catch (Flourish\ValidationException $e) {
					$this->messenger->record('error', self::MSG_INCORRECT);
				}
			}

			return $this->view->load('account/login.html', ['number' => $number]);
		}


		/**
		 * Entry point to allow users manage their profile
		 *
		 * @access public
		 * @param Profile The profile service
		 * @return View A profile view
		 */
		public function profile(Profile $profile)
		{
			if ($this->request->checkMethod(HTTP\POST)) {
				$data = $this->request->params->get();

				$profile->update($data);
				$this->messenger->record('success', self::MSG_THANKS);

				$this->router->redirect('/dashboard');
			}

			return $this->view->load('account/profile.html', [
				'person'       => $profile->getPerson(),
				'action_types' => $profile->getActionTypes()
			]);
		}


		/**
		 *
		 */
		public function recover(Profile $profile, Recovery $recovery)
		{
			$token = $this->request->params->get('token');
			$email = $this->request->params->get('email');

			if (!$token) {
				if ($this->request->checkMethod(HTTP\POST)) {
					try {
						$recovery->sendEmail($email);
						$this->messenger->record('success', self::MSG_EMAIL_SENT);

					} catch (Flourish\ValidationException $e) {
						$this->messenger->record('error', self::MSG_EMAIL_INVALID);

					} catch (Flourish\NotFoundException $e) {
						$this->messenger->record('error', self::MSG_EMAIL_MISSING);

					}
				}

			} elseif ($this->request->checkMethod(HTTP\POST)) {

			}

			return $this->view->load('account/recover.html', [
				'token' => $token,
				'email' => $email
			]);
		}
	}
}
