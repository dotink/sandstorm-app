<?php namespace Sandstorm\Security
{
	use Inkwell\Core as App;
	use JWT;

	/**
	 *
	 *
	 */
	class Tokenizer
	{
		/**
		 *
		 */
		public function __construct(App $app)
		{
			$this->app        = $app;
			$this->key        = $app['engine']->fetch('tokenizer', 'key', 'This key is insecure default');
			$this->algorithm  = $app['engine']->fetch('tokenizer', 'desired_algorithm', 'HS256');
			$this->algorithms = $app['engine']->fetch('tokenizer', 'supported_algorithms', ['HS256']);
		}


		/**
		 *
		 */
		public function encode($data)
		{
 			return JWT::encode($data, $this->key, $this->algorithm);
		}


		/**
		 *
		 */
		public function decode($token)
		{
			return JWT::decode($token, $this->key, $this->algorithms);
		}
	}
}
