<?php namespace Sandstorm
{
	use IW\HTTP;
	use Dotink\Flourish;

	/**
	 * A main/fallback and error controller
	 */
	class MainController extends Controller
	{
		/**
		 * Handle not found responses
		 *
		 * @access public
		 * @return View A not found view
		 */
		public function notFound()
		{
			return $this->view->load('errors/not_found.html');
		}


		/**
		 * Load a static template as a page for non-dynamic content
		 *
		 * @access public
		 * @return Response A response containing the loaded view, or a 404 if not found
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
