<?php

namespace Buglinjo\LaravelWebp\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelWebp extends Facade {

	/**
	 * Return facade accessor
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'webp';
	}
}