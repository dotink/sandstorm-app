<?php namespace Sandstorm
{
	use Inkwell\Controller\BaseController;
	use Inkwell\View;

	class MainController extends BaseController
	{
		protected $view;

		/**
		 *
		 */
		public function __construct(View $view)
		{
			$this->view = $view;
		}


		/**
		 *
		 */
		public function page()
		{
			$request_path = $this->request->getUri()->getPath();
			$template     = substr($request_path, -1, 1) == '/'
				? $request_path . 'index.html'
				: $request_path . '.html';

			try {
				$this->view->load(ltrim($template, '/'))->resolve();
				$this->response->set($this->view);

			} catch (Flourish\NotFoundException $e) {
				$this->response->setStatus(HTTP\NOT_FOUND);
			}

			return $this->response;
		}
	}
}
