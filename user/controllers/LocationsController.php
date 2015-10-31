<?php namespace Sandstorm
{
	use IW\HTTP;
	use Dotink\Flourish;
	use Tenet\Accessor;


	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class LocationsController extends Controller
	{
		const MSG_CREATED = 'The location has been successfully created.';


		/**
		 *
		 */
		public function manage(Locations $locations, Locator $locator, Accessor $accessor)
		{
			$action = $this->request->params->get('action', 'index');

			if (in_array($action, ['add'])) {
				return $this->$action($locations, $locator, $accessor);
			}

			return $this->view->load('locations/index.html');
		}


		/**
		 *
		 */
		public function select(Locations $locations, Accessor $accessor)
		{
			$id     = $this->request->params->get('id');
			$slug   = $this->request->params->get('slug');
			$entity = $locations->find($id);

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

			return $this->view->load('locations/view.html', [
				'location' => $entity
			]);
		}


		/**
		 *
		 */
		protected function add(Locations $locations, Locator $locator, Accessor $accessor)
		{
			$location = $locations->create();

			if ($this->request->checkMethod(HTTP\POST)) {
				$accessor->fill($location, $this->request->params->get());
				$locator->update($location);

				$locations->save($location, TRUE);

				$this->messenger->record('success', self::MSG_CREATED);

				$this->router->redirect(
					$this->router->anchor('/locations/[id]-[ws:slug]', [
						'id'   => $location->getId(),
						'slug' => $location->getName()
					])
				);
			}

			return $this->view->load('locations/add.html', [
				'location' => $location
			]);
		}
	}
}
