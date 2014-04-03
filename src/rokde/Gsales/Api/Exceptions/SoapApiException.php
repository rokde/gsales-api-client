<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 01.04.14
 * Time: 16:20
 */

namespace Rokde\Gsales\Api\Exceptions;


use Exception;
use SoapClient;

class SoapApiException extends ApiException {

	/**
	 * @var \SoapClient
	 */
	private $soapClient;

	/**
	 * @param string $message
	 * @param int $code
	 * @param SoapClient $soapClient
	 * @param Exception $previous
	 */
	public function __construct($message, $code, SoapClient $soapClient, Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
		$this->soapClient = $soapClient;
	}

	/**
	 * returns last request
	 *
	 * @return string
	 */
	public function getLastRequest()
	{
		return $this->soapClient->__getLastRequest();
	}

	/**
	 * returns last request headers
	 *
	 * @return string
	 */
	public function getLastRequestHeaders()
	{
		return $this->soapClient->__getLastRequestHeaders();
	}

	/**
	 * returns last response
	 *
	 * @return string
	 */
	public function getLastResponse()
	{
		return $this->soapClient->__getLastResponse();
	}

	/**
	 * returns last response headers
	 *
	 * @return string
	 */
	public function getLastResponseHeaders()
	{
		return $this->soapClient->__getLastResponseHeaders();
	}
}