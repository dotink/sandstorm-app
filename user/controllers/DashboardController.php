<?php namespace Sandstorm
{
	use IW\HTTP;
	use Dotink\Flourish;

	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class DashboardController extends Controller
	{
		/**
		 *
		 */
		public function main(Profile $profile)
		{
			return $this->view->load('dashboard/index.html', [
				'person' => $profile->getPerson()
			]);
		}
	}
}
