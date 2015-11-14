<?php namespace Sandstorm
{
	use IW\HTTP;
	use Dotink\Flourish;
	use Tenet\Accessor;


	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class OrganizationsController extends Controller
	{
		const MSG_CREATED = 'The organization has been successfully created.';
		const MSG_JOIN_SUCCESS = 'You have successfully joined this organization';
		const MSG_LEAVE_SUCCESS = 'You have successfully left this organization';

		/**
		 *
		 */
		static protected $entityActions = ['view', 'edit', 'join', 'leave'];

		/**
		 *
		 */
		static protected $repoActions = ['index', 'add'];


		/**
		 *
		 */
		public function manage(Organizations $repo, Accessor $accessor)
		{
			$action = $this->request->params->get('action');

			if (!in_array($action, static::$repoActions)) {
				$action = reset(static::$repoActions);
			}

			return $this->$action($repo, $accessor);
		}


		/**
		 *
		 */
		public function select(Organizations $organizations, Accessor $accessor)
		{
			extract($this->request->params->get([
				'id', 'slug', 'action'
			]));

			$entity = $organizations->find($id);

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

			if (!in_array($action, static::$entityActions)) {
				$action = reset(static::$entityActions);
			}

			return $this->$action($entity, $accessor);
		}


		/**
		 *
		 */
		protected function add(Organizations $organizations, Accessor $accessor)
		{
			$organization = $organizations->create();

			if ($this->request->checkMethod(HTTP\POST)) {
				$accessor->fill($organization, $this->request->params->get());
				$organization->setOwner($this->auth->entity->getPerson());

				$this->messenger->record('success', self::MSG_CREATED);

				$this->router->redirect(NULL);
			}

			return $this->view->load('organizations/add.html', [
				'organization' => $organization
			]);
		}


		/**
		 *
		 */
		public function edit(Organization $organization, Accessor $accessor)
		{
			if ($this->request->checkMethod(HTTP\POST)) {
				$accessor->fill($organization, $this->request->params->get());
				$organization->setOwner($this->auth->entity->getPerson());

				$this->messenger->record('success', self::MSG_CREATED);

				$this->router->redirect(NULL);
			}

			return $this->view->load('organizations/edit.html', [
				'organization' => $organization
			]);

		}

		/**
		 *
		 */
		protected function index(Organizations $organizations)
		{
			return $this->view->load('organizations/index.html', [
				'recent_organizations' => $organizations->findBy([], ['dateCreated' => 'DESC'], 5)
			]);
		}


		/**
		 *
		 */
		protected function join(Organization $organization)
		{
			$user = $this->auth->entity->getPerson();

			$user->joinOrganization($organization);
			$this->messenger->record('success', self::MSG_JOIN_SUCCESS);
			$this->router->redirect(['query' => array()]);
		}


		/**
		 *
		 */
		protected function leave(Organization $organization)
		{
			$user = $this->auth->entity->getPerson();

			$user->leaveOrganization($organization);
			$this->messenger->record('success', self::MSG_LEAVE_SUCCESS);
			$this->router->redirect(['query' => array()]);
		}

		/**
		 *
		 */
		protected function view(Organization $organization)
		{
			$user = $this->auth->entity->getPerson();

			return $this->view->load('organizations/view.html', [
				'organization' => $organization,
				'user'         => $user,
			]);
		}
	}
}
