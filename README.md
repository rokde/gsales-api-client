# SOAP API Client for gSales

[![Latest Stable Version](https://poser.pugx.org/rokde/gsales-api-client/v/stable.svg)](https://packagist.org/packages/rokde/gsales-api-client) [![Latest Unstable Version](https://poser.pugx.org/rokde/gsales-api-client/v/unstable.svg)](https://packagist.org/packages/rokde/gsales-api-client) [![License](https://poser.pugx.org/rokde/gsales-api-client/license.svg)](https://packagist.org/packages/rokde/gsales-api-client) [![Total Downloads](https://poser.pugx.org/rokde/gsales-api-client/downloads.svg)](https://packagist.org/packages/rokde/gsales-api-client)

## A generic api client for the billing system gSales

We support API version 2.2 (published on 24th of September 2013).

----

[API Documentation](http://www.gsales.de/api_documentation.pdf)

----

## Installation

Add to your composer.json following lines

	"require": {
		"rokde/gsales-client-api": "~1.0"
	}

### Using in Vanilla PHP

	$wsdl = 'http://URL-TO-YOUR/api/api.php?wsdl';
	$apikey = 'YOUR-API-KEY-HERE';
	$client = new \Rokde\Gsales\Api\Client($wsdl, $apikey);
	echo $client->customer()->count(); // returns number of customers

That's it.

### Using in Frameworks

#### Using in Laravel 4.x

After installing the package you have to add the following line to your `providers` Array in your app.php:

	'Rokde\Gsales\Api\Supports\Laravel\LaravelGsalesApiClientServiceProvider',

To get your GsalesApiClient configured publish it's configuration:

	php artisan config:publish rokde/gsales-api-client

Then you can set your `wsdl` and `apikey` to the published configuration file.

The service provider for laravel automatically creates a facade `GsalesApiClient` for you. So you can use it from the
	beginning like so:

	GsalesApiClient::queue()->all(); // get all queue entries

or without facade:

	$apiClient = App::make('gsales-api-client');
	$apiClient->queue()->all();


#### Other Frameworks

We do not use any other frameworks with this package yet. But please let us know when you need it elsewhere. Or fork it
	and develop your own. We appreciate pushing back your extension ;)