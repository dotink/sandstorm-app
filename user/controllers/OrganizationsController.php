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


		/**
		 *
		 */
		public function manage(Organizations $organizations, Accessor $accessor)
		{
			$action = $this->request->params->get('action', 'index');

			if (in_array($action, ['add'])) {
				return $this->$action($organizations, $accessor);
			}

			return $this->view->load('organizations/index.html', [
				'recent_organizations' => $organizations->findBy([], ['dateCreated' => 'DESC'], 5)
			]);
		}


		/**
		 *
		 */
		public function select(Organizations $organizations, Accessor $accessor)
		{
			$id     = $this->request->params->get('id');
			$slug   = $this->request->params->get('slug');
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
	}
}
