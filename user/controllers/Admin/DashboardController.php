<?php namespace Sandstorm\Admin
{
	use IW\HTTP;
	use Dotink\Flourish;
	use Sandstorm\Controller;

	/**
	 * A main/fallback and error controller
	 */
	class DashboardController extends Controller
	{
		/**
		 *
		 * TODO: Remove once a better system is in place
		 */
		public function main()
		{
			return $this->view->load('admin/dashboard/index.html', [
			]);
		}
	}
}
