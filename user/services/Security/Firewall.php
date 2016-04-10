<?php namespace Sandstorm\Security
{
	use Inkwell\Core as App;
	use Inkwell\Http\Resource\Request;
	use Inkwell\Http\Resource\Response;

	use IW\HTTP;

	use Dotink\Flourish;

	/**
	 *
	 *
	 */
	class Firewall
	{

		protected $loginPath = '/login';

		protected $privatePaths = array();

		protected $publicPaths = array();

		protected $requireLogin = FALSE;

		/**
		 *
		 */
		public function __construct(App $app)
		{
			//
			// TODO: Replace app with a interface that provides specific configurations
			// e.g. getPublicPages(), requireLogin(), etc.
			//

			$this->auth         = $app['auth'];
			$this->requireLogin = $app['engine']->fetch('firewall', 'require_login', FALSE);
			$this->loginPath    = $app['engine']->fetch('firewall', 'login_path', '/login');

			foreach ($app['engine']->fetch('@firewall') as $id) {
				$this->publicPaths = array_merge(
					$app['engine']->fetch($id, '@firewall.public', []),
					$this->publicPaths
				);
			}

			foreach ($app['engine']->fetch('@firewall') as $id) {
				$this->privatePaths = array_merge(
					$app['engine']->fetch($id, '@firewall.private', []),
					$this->privatePaths
				);
			}
		}


		/**
		 *
		 */
		public function __invoke(Request $request, Response $response, $next = NULL)
		{
			$request_path  = $request->getURI()->getPath();
			$is_authorized = FALSE;


			if (!$this->requireLogin) {
				$is_authorized = TRUE;
			} elseif (!$this->auth->is('Anonymous')) {
				$is_authorized = TRUE;
			} else {
				foreach ($this->publicPaths as $path) {
					if (preg_match('#^' . $path . '$#i', $request_path)) {
						$is_authorized = TRUE;
					}
				}
			}

			foreach ($this->privatePaths as $path => $roles) {
				if (!preg_match('#^' . $path. '$#i', $request_path, $matches)) {
					continue;
				}

				$is_authorized = FALSE;

				foreach ($roles as $role) {
					if ($this->auth->is($role)) {
						$is_authorized = TRUE;
						break 2;
					}
				}
			}

			if (!$is_authorized) {
				$response->setStatusCode(303);
				$response->headers->set('Location', $request->getURI()->modify($this->loginPath));

				return $response;
			}

			return $next($request, $response);
		}
	}
}
