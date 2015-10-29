<?php namespace Sandstorm
{
	use IW\HTTP;
	use Dotink\Flourish;
	use Tenet\Accessor;


	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class ActionsController extends Controller
	{
		const MSG_CREATED = 'The action has been successfully created.';


		/**
		 *
		 */
		public function manage(Actions $actions, ActionTypes $action_types, Accessor $accessor)
		{
			$action = $this->request->params->get('action', 'index');

			if (in_array($action, ['add'])) {
				return $this->$action($actions, $action_types, $accessor);
			}

			return $this->view->load('actions/index.html');
		}


		/**
		 *
		 */
		protected function add(Actions $actions, ActionTypes $action_types, Accessor $accessor)
		{
			$action = $actions->create();

			if ($this->request->checkMethod(HTTP\POST)) {
				$accessor->fill($action, $this->request->params->get());
				$organization->setLeader($this->auth->entity->getPerson());

				$this->messenger->record('success', self::MSG_CREATED);

				$this->router->redirect(NULL);
			}

			return $this->view->load('actions/add.html', [
				'action'       => $action,
				'action_types' => $action_types->findAll(),
				'person'       => $this->auth->entity->getPerson()
			]);
		}
	}
}
