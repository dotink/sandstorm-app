<?php namespace Sandstorm
{
	use IW\HTTP;
	use Dotink\Flourish;

	/**
	 * The account controller is responsible for entry points for account access and settings
	 */
	class UserController extends Controller
	{
		/**
		 *
		 */
		public function organizations(Profile $profile)
		{
			return $this->view->load('user/organizations.html', [
				'person' => $profile->getPerson()
			]);
		}
	}
}
