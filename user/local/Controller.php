<?php namespace Sandstorm
{
	use IW\HTTP;

	use Inkwell\View;
	use Inkwell\Auth;
	use Inkwell\Controller\BaseController;

	use Dotink\Flourish;

	/**
	 * The account controller is responsible for entry points for account access and settings
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
		 * Instantiate the AccountController
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

			$this->view->set('messenger', $messenger);
		}


		/**
		 *
		 */
		public function prepare($action, $context = array())
		{
			$this->view->set('auth', $this->auth);

			parent::prepare($action, $context);
		}
	}
}
