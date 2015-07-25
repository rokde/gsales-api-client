# SOAP API Client for gSales

[![Latest Stable Version](https://poser.pugx.org/rokde/gsales-api-client/v/stable.svg)](https://packagist.org/packages/rokde/gsales-api-client) [![Latest Unstable Version](https://poser.pugx.org/rokde/gsales-api-client/v/unstable.svg)](https://packagist.org/packages/rokde/gsales-api-client) [![License](https://poser.pugx.org/rokde/gsales-api-client/license.svg)](http://rok.mit-license.org/) [![Total Downloads](https://poser.pugx.org/rokde/gsales-api-client/downloads.svg)](https://packagist.org/packages/rokde/gsales-api-client)

## A generic api client for the billing system gSales

We support API version 2.3 (published on 20th of August 2014).

----

[API Documentation](http://www.gsales.de/api_documentation.pdf)

----

## Table of contents

1. [Installation](#installation)
1. [Contexts](#contexts)
 1. [Article](#article)
 1. [Authentication](#authentication)
 1. [Comment](#comment)
 1. [Configuration](#configuration)
 1. [Contract](#contract)
 1. [Customer](#customer)
 1. [Document](#document)
 1. [Invoice](#invoice)
 1. [Mailspool](#mailspool)
 1. [Newsletter](#newsletter)
 1. [Offer](#offer)
 1. [Queue](#queue)
 1. [Refund](#refund)
 1. [User](#user)
1. [Using in Frameworks](#using-in-frameworks)
 1. [Using in Laravel 4](#using-in-laravel-4)
 1. [Other Frameworks](#other-frameworks)

## Installation

Add to your composer.json following lines

	"require": {
		"rokde/gsales-api-client": "~1.0"
	}

### Using in Vanilla PHP

	$wsdl = 'http://URL-TO-YOUR/api/api.php?wsdl';
	$apikey = 'YOUR-API-KEY-HERE';
	$client = new \Rokde\Gsales\Api\Client($wsdl, $apikey);
	echo $client->customer()->count(); // returns number of customers

That's it.


### Contexts

You have a lot of contexts to group api commands together.


#### Article

All article related commands are grouped in the `Article` context.

	$client->article()->...;

Following methods are available for the article context:

 - `get($articleId)`
 - `all()`
 - `count()`
 - `create($article)`
 - `update($article)`
 - `delete($article)`


##### Create an article

	$article = new \Rokde\Gsales\Api\Types\Article\Base();
	$article->setTitle('Projectmanagement')
		->setRetailPrice(120);
	$apiClient->article()->create($article);


#### Authentication

All authentication related commands are grouped in the `Authentication` context.

	$client->authentication()->...;

Following methods are available for the authentication context:

 - `passwordLost($customer)`
 - `changePassword($customer, $newPassword)`
 - `login($customer, $password)`
 - `enableLogin($customer)`
 - `enableLoginById($customer)`
 - `disableLogin($customer)`
 - `disableLoginById($customer)`


#### Comment

All comment related commands are grouped in the `Comment` context.

	$client->comment()->...;

Following methods are available for the comment context:

 - `get($commentId)`
 - `all($sub, $recordId)`
 - `create($comment)`
 - `delete($comment)`


#### Configuration

All configuration related commands are grouped in the `Configuration` context.

	$client->configuration()->...;

Following methods are available for the configuration context:

 - `get($key)`


#### Contract

All contract related commands are grouped in the `Contract` context.

	$client->contract()->...;

Following methods are available for the contract context:

 - `get($contractId)`
 - `all()`
 - `repayable()`
 - `processRepayable()`
 - `processRepayableForCustomer($customer)`
 - `processRepayableContract($contract)`
 - `count()`
 - `enable($contract)`
 - `disable($contract)`
 - `createPosition($contract, $position)`
 - `updatePosition($contract, $position)`
 - `deletePosition($contract, $position)`
 - `delete($contract)`
 - `createForCustomer($customer, $contract)`
 - `update($contract, $data)`
 - `updateEndDate($contract, $month, $year)`
 - `removeEndDate($contract)`


#### Customer

All customer related commands are grouped in the `Customer` context.

	$client->customer()->...;

Following methods are available for the customer context:

 - `get($customerId)`
 - `all()`
 - `count()`
 - `repayable()`
 - `create($customer)`
 - `update($customer)`
 - `updateProposal($customer)`
 - `delete($customer)`


##### Fetch the number of customers

	$apiClient->customer()->count();


##### Fetch all customers

	$apiClient->customer()->all()


#### Document

All document related commands are grouped in the `Document` context.

	$client->document()->...;

Following methods are available for the document context:

 - `get($documentId)`
 - `all()`
 - `file($documentId)`


#### Invoice

All invoice related commands are grouped in the `Invoice` context.

	$client->invoice()->...;

Following methods are available for the invoice context:

 - `get($invoiceId)`
 - `all()`
 - `count()`
 - `paid($invoice)`
 - `open($invoice)`
 - `canceled($invoice)`
 - `createPosition($invoice, $position)`
 - `updatePosition($invoice, $position)`
 - `deletePosition($invoice, $position)`
 - `delete($invoice)`
 - `createForCustomer($customer)`
 - `create($invoice)`
 - `update($invoice)`
 - `addToMailspool($invoice)`
 - `pdf($invoice)`


#### Mailspool

All mailspool related commands are grouped in the `Mailspool` context.

	$client->mailspool()->...;

Following methods are available for the mailspool context:

 - `send()`
 - `get($mailSpoolId)`
 - `all()`
 - `count()`
 - `duplicate($mailspool)`
 - `approve($mailspool)`
 - `removeApproval($mailspool)`
 - `create($mailspool)`
 - `update($mailspool)`
 - `delete($mailspool)`
 - `readByRecipient($mailspool)`


#### Newsletter

All newsletter related commands are grouped in the `Newsletter` context.

	$client->newsletter()->...;

Following methods are available for the newsletter context:

 - `get($newsletterId)`
 - `all()`
 - `count()`
 - `recipients($newsletter)`
 - `create($newsletter)`
 - `update($newsletter)`
 - `delete($newsletter)`
 - `addRecipient($newsletter, $recipient)`
 - `addCustomerAsRecipient($newsletter, $customer)`
 - `removeRecipient($newsletter, $recipient)`
 - `spool($newsletter)`


#### Offer

All offer related commands are grouped in the `Offer` context.

	$client->offer()->...;

Following methods are available for the offer context:

 - `get($offerId)`
 - `all()`
 - `count()`
 - `accept($offer)`
 - `declined($offer)`
 - `open($offer)`
 - `billed($offer)`
 - `createPosition($offer, $position)`
 - `updatePosition($offer, $position)`
 - `deletePosition($offer, $position)`
 - `delete($offer)`
 - `createForCustomer($customer)`
 - `create($offer)`
 - `update($offer)`
 - `addToMailspool($offer)`
 - `pdf($offer)`
 - `convertToInvoice($offer, $invoiceApiContext)`
 - `convertToInvoicePositions($offer, $invoice, $invoiceApiContext)`


#### Queue

All queue related commands are grouped in the `Queue` context.

	$client->queue()->...;

Following methods are available for the queue context:

 - `get($queueId)`
 - `all()`
 - `count()`
 - `create($queueEntry)`
 - `update($queueEntry)`
 - `delete($queueEntry)`
 - `auto($queueEntry)`
 - `manual($queueEntry)`
 - `noApproval($queueEntry)`
 - `createInvoice($customer)`
 - `createInvoices()`


##### Create a queue entry

	$queueEntry = new \Rokde\Gsales\Api\Types\Queue\Base();
	$queueEntry->setPositionText('Test')
		->setCustomerId(37)
		->setPrice(1.23)
		->setQuantity(1)
		->setApproval(0)
		->setUnit('x')
		->setDiscount(0)
		->setTax(0.19);
	$apiClient->queue()->create($queueEntry);


#### Refund

All refund related commands are grouped in the `Refund` context.

	$client->refund()->...;

Following methods are available for the refund context:

 - `get($refundId)`
 - `all()`
 - `count()`
 - `paid($refund)`
 - `canceled($refund)`
 - `open($refund)`
 - `createPosition($refund, $position)`
 - `updatePosition($refund, $position)`
 - `deletePosition($refund, $position)`
 - `delete($refund)`
 - `createForCustomer($customer)`
 - `create($refund)`
 - `update($refund)`
 - `addToMailspool($refund)`
 - `pdf($refund)`


#### User

All user related commands are grouped in the `User` context.

	$client->user()->...;

Following methods are available for the user context:

 - `get($userId)`
 - `all()`
 - `count()`
 - `create($user)`
 - `update($user)`
 - `delete($user)`
 - `lock($user)`
 - `unlock($user)`
 - `availableRoles()`
 - `roles($user)`
 - `addRole($user, $role)`
 - `removeRole($user, $role)`


### Using in Frameworks

#### Using in Laravel 4

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
