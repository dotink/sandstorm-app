<?php namespace Sandstorm
{
	use IW\HTTP;

	use Inkwell\View;
	use Inkwell\Auth;
	use Inkwell\Controller\BaseController;

	use Dotink\Flourish;

	/**
	 * A core controller which provides standard services used almost everywhere
	 */
	class Controller extends BaseController implements Auth\ConsumerInterface
	{
		use Auth\StandardConsumer;

		/**
		 * The messenger, capable of sending messages across requests
		 *
		 * @access protected
		 * @var Flourish\Messenger
		 */
		protected $messenger;


		/**
		 * A view object to render templates
		 *
		 * @access protected
		 * @var View
		 */
		protected $view;


		/**
		 * Instantiate the Controller
		 *
		 * @access public
		 * @param Messenger $messenger The messenger, capable of sending messages across requests
		 * @param View $view A view object to render templates
		 * @return void
		 */
		public function __construct(View $view, Flourish\Messenger $messenger)
		{
			$this->view      = $view;
			$this->messenger = $messenger;
		}


		/**
		 * The prepare method is called post-instantiation and sets up common services
		 *
		 * @access public
		 * @param string $action The name of the action (method) being executed
		 * @param array $context The gateway context including request, response, and router
		 * @return void
		 */
		public function prepare($action, $context = array())
		{
			$this->view->set([
				'auth'      => $this->auth,
				'messenger' => $this->messenger
			]);

			return parent::prepare($action, $context);
		}
	}
}
