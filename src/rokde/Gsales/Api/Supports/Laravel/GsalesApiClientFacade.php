<?php namespace Rokde\Gsales\Api\Supports\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * Class GsalesApiClientFacade
 *
 * GsalesApiClient facade
 *
 * @package Rokde\Gsales\Api\Supports\Laravel
 */
class GsalesApiClientFacade extends Facade {

	/**
	 * facade accessor
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'gsales-api-client';
	}

}