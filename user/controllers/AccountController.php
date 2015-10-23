<?php namespace Sandstorm
{
	use IW\HTTP;

	use Dotink\Flourish;
	use Inkwell\Controller\BaseController;
	use Inkwell\View;

	use Sandstorm\Security\AuthService;

	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class AccountController extends BaseController
	{
		const MSG_INIT      = 'You should receive a text with your passphrase momentarily.';
		const MSG_INCORRECT = 'The passphrase you entered was incorrect, please try again.';
		const MSG_THANKS    = 'Thanks, make sure to come back if you need to update your info.';

		/**
		 *
		 */
		protected $messenger;

		/**
		 *
		 */
		protected $view;


		/**
		 * Instantiate the AccountController
		 *
		 * @param View $view The view object to be used on subsequent actions
		 */
		public function __construct(View $view, Flourish\Messenger $messenger)
		{
			$this->view      = $view;
			$this->messenger = $messenger;

			$this->view->set('messenger', $messenger);
		}


		/**
		 *
		 * TODO: Remove once a better system is in place
		 */
		public function create(ProfileService $profile_service)
		{
			$action = $this->request->params->get('action');
			$pass   = $this->request->params->get('pass');
			$allow  = $pass == getenv('CREATE_PASS');

			if ($this->request->checkMethod(HTTP\POST) && $allow && $action == 'create') {
				$data = $this->request->params->get();

				try {
					$profile_service->create($data);
					$this->messenger->record('success', 'The contact has been added!');

				} catch (Flourish\ValidationException $e) {
					$this->messenger->record('error', $e->getMessage());
				}
			}

			return $this->view->load('account/create.html', [
				'person'       => $profile_service->getPerson(),
				'action_types' => $profile_service->getActionTypes(),
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
		 * @param AuthService $auth_service The authorization service to use for the handshake
		 * @return View The enter view
		 */
		public function enter(AuthService $auth_service)
		{
			if ($this->request->checkMethod(HTTP\POST)) {
				$number = $this->request->params->get('number');

				if ($auth_service->handshake($number)) {
					$this->messenger->record('notice', self::MSG_INIT);

					$this->router->redirect('/login?number=' . $number);
				}
			}

			return $this->view->load('account/enter.html');
		}


		/**
		 * Entry point to allow users to log in with a login phone number and login phrase
		 *
		 * @access public
		 * @param AuthService $auth_service The authorization service
		 * @return View A login view
		 */
		public function login(AuthService $auth_service)
		{
			$number = $this->request->params->get('number');

			if ($this->request->checkMethod(HTTP\POST)) {
				$phrase = $this->request->params->get('phrase');

				if ($auth_service->login($number, $phrase)) {
					// TODO: redirect to dashboard when available
					$this->router->redirect('/profile');
				}

				$this->messenger->record('error', self::MSG_INCORRECT);
			}

			return $this->view->load('account/login.html', ['number' => $number]);
		}


		/**
		 * Entry point to allow users manage their profile
		 *
		 * @access public
		 * @param ProfileService The profile service
		 * @return View A profile view
		 */
		public function profile(ProfileService $profile_service)
		{
			if ($this->request->checkMethod(HTTP\POST)) {
				$data = $this->request->params->get();

				$profile_service->update($data);
				$this->messenger->record('success', self::MSG_THANKS);

				$this->router->redirect(NULL);
			}

			return $this->view->load('account/profile.html', [
				'person'       => $profile_service->getPerson(),
				'action_types' => $profile_service->getActionTypes()
			]);
		}
	}
}
