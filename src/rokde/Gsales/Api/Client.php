<?php namespace Rokde\Gsales\Api;

use Rokde\Gsales\Api\Contexts\Api;
use SoapClient;

/**
 * Class Client
 *
 * @package Rokde\Gsales\Api
 */
class Client extends Api
{
	const CONTEXT_NAMESPACE = "\\Rokde\\Gsales\\Api\\Contexts\\";

	/**
	 * contexts array
	 *
	 * @var array
	 */
	protected $contexts = array();

	/**
	 * @param string $wsdl
	 * @param string $apikey
	 * @param array $options
	 */
	public function __construct($wsdl, $apikey, array $options = array())
	{
		if ( ! isset($options['classmap'])) {
			$options['classmap'] = static::classmap();
		} else {
			$options['classmap'] = array_merge(static::classmap(), $options['classmap']);
		}
//
//        $options = array_merge($options, array('proxy_host'     => "127.0.0.1",
//            'proxy_port'     => 8080));


		parent::__construct(new SoapClient($wsdl, $options), $apikey);
	}


	/**
	 * returns a customer context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Customer
	 */
	public function customer()
	{
		return $this->getContextInstance('Customer');
	}

	/**
	 * returns an authentication context, doing authentication and stuff like that
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Authentication
	 */
	public function authentication()
	{
		return $this->getContextInstance('Authentication');
	}

	/**
	 * returns an offer context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Offer
	 */
	public function offer()
	{
		return $this->getContextInstance('Offer');
	}

	/**
	 * returns an invoice context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Invoice
	 */
	public function invoice()
	{
		return $this->getContextInstance('Invoice');
	}

	/**
	 * returns a refund context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Refund
	 */
	public function refund()
	{
		return $this->getContextInstance('Refund');
	}

	/**
	 * returns a contract context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Contract
	 */
	public function contract()
	{
		return $this->getContextInstance('Contract');
	}

	/**
	 * returns a queue context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Queue
	 */
	public function queue()
	{
		return $this->getContextInstance('Queue');
	}

	/**
	 * returns a mail spool context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Mailspool
	 */
	public function mailspool()
	{
		return $this->getContextInstance('Mailspool');
	}

	/**
	 * returns a newsletter context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Newsletter
	 */
	public function newsletter()
	{
		return $this->getContextInstance('Newsletter');
	}

	/**
	 * returns an article context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Article
	 */
	public function article()
	{
		return $this->getContextInstance('Article');
	}

	/**
	 * returns a document context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Document
	 */
	public function document()
	{
		return $this->getContextInstance('Document');
	}

	/**
	 * returns a comment context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Comment
	 */
	public function comment()
	{
		return $this->getContextInstance('Comment');
	}

	/**
	 * returns an user context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\User
	 */
	public function user()
	{
		return $this->getContextInstance('User');
	}

	/**
	 * returns a configuration context
	 *
	 * @return \Rokde\Gsales\Api\Contexts\Configuration
	 */
	public function configuration()
	{
		return $this->getContextInstance('Configuration');
	}

	/**
	 * returns an api context
	 *
	 * @param string $context
	 *
	 * @return Api
	 */
	protected function getContextInstance($context)
	{
		if ( ! isset($this->contexts[$context])) {
			$contextClass = self::CONTEXT_NAMESPACE . $context;

            $this->contexts[$context] = new $contextClass($this->getClient(), $this->getApiKey());
		}

		return $this->contexts[$context];
	}
}