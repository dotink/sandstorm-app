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
		public function manage(Actions $actions, ActionTypes $action_types, Locations $locations, Accessor $accessor)
		{
			$action = $this->request->params->get('action', 'index');

			if (in_array($action, ['add'])) {
				return $this->$action($actions, $action_types, $locations, $accessor);
			}

			return $this->view->load('actions/index.html');
		}


		/**
		 *
		 */
		public function select(Actions $actions, Accessor $accessor)
		{
			$id     = $this->request->params->get('id');
			$slug   = $this->request->params->get('slug');
			$entity = $actions->find($id);

			if (!$entity) {
				$this->response->setStatus(HTTP\NOT_FOUND);
				$this->router->demit();
			}

			$current_path   = $this->request->getURI()->getPath();
			$canonical_slug = $this->router->anchor('[ws:name]', [
				'name' => $entity->getName()
			]);

			if ($canonical_slug != $slug) {
				$this->router->redirect([
					'path' => str_replace($slug, $canonical_slug, $current_path)
				]);
			}

			return $this->view->load('actions/view.html', [
				'action' => $entity
			]);
		}


		/**
		 *
		 */
		protected function add(Actions $actions, ActionTypes $action_types, Locations $locations, Accessor $accessor)
		{
			extract($this->request->params->get([
				'location',
				'postal_code'
			]));

			if (!$location) {
				if (!$postal_code) {
					return $this->view->load('actions/find-location.html');
				}

				return $this->view->load('actions/select-location.html', [
					'locations' => $locations->findByPostalCode($postal_code)
				]);
			}

			$action = $actions->create();

			if ($this->request->checkMethod(HTTP\POST)) {
				$accessor->fill($action, $this->request->params->get());
				$action->setLeader($this->auth->entity->getPerson());

				$actions->save($action, TRUE);

				$this->messenger->record('success', self::MSG_CREATED);

				$this->router->redirect(
					$this->router->anchor('/actions/[id]-[ws:slug]', [
						'id'   => $action->getId(),
						'slug' => $action->getName()
					])
				);
			}

			return $this->view->load('actions/add.html', [
				'action'       => $action,
				'action_types' => $action_types->findAll(),
				'location'     => $locations->find($location),
				'person'       => $this->auth->entity->getPerson(),
			]);
		}
	}
}
