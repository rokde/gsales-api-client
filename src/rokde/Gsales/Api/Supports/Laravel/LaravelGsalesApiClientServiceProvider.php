<?php namespace Rokde\Gsales\Api\Supports\Laravel;

use Config;
use Illuminate\Support\ServiceProvider;
use Rokde\Gsales\Api\Client;

/**
 * Class LaravelGsalesApiClientServiceProvider
 *
 * The Laravel Service Provider
 *
 * @package Rokde\Gsales\Api\Supports\Laravel
 */
class LaravelGsalesApiClientServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * booting the package
	 */
	public function boot()
	{
		$this->package('rokde/gsales-api-client');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$wsdl = Config::get('gsales-api-client::gsales.wsdl');
		$apikey = Config::get('gsales-api-client::gsales.apikey');

		if (empty($wsdl) || empty($apikey))
			return;

		$this->app->bindShared('gsales-api-client', function () use ($wsdl, $apikey) {
			return new Client($wsdl, $apikey);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('gsales-api-client');
	}
}