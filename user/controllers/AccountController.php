<?php namespace Sandstorm
{
	use IW\HTTP;

	use Inkwell\Controller\BaseController;
	use Inkwell\View;

	use Sandstorm\Security\AuthService;

	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class AccountController extends BaseController
	{
		protected $view;

		/**
		 * Instantiate the AccountController
		 *
		 * @param View $view The view object to be used on subsequent actions
		 */
		public function __construct(View $view)
		{
			$this->view = $view;
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

				$auth_service->handshake($number);
				$this->router->redirect('/login');
			}

			return $this->view->load('account/enter.html');
		}


		/**
		 *
		 */
		public function login(AuthService $auth_service)
		{
			if ($this->request->checkMethod(HTTP\POST)) {
				$code = $this->request->params->get('code');

				if (!$code) {

				}

				$auth_service->login($code);
			}

			return $this->view->load('account/login.html');
		}
	}
}
