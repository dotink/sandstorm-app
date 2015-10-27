<?php namespace Sandstorm
{
	use iMarc\Auth;
	use Tenet\AccessInterface;
	use Tenet\Access\AccessibleTrait;

	/**
	 *
	 */
	class Entity implements Auth\AuthInterface, AccessInterface
	{
		use AccessibleTrait;

		/**
		 *
		 */
		public function can(Auth\Manager $manager, $permission)
		{
			$custom_method = 'can' . ucfirst($permission);

			if (method_exists($this, $custom_method)) {
				return $this->$custom_method($manager);
			}

			return $manager->has($permission, $this);
		}
	}
}
