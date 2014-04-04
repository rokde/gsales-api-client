<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 14:13
 */

namespace Rokde\Gsales\Api\Contexts;


use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Exceptions\SoapApiException;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\Status;
use SoapClient;

class Api
{
	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * internal soap client
	 *
	 * @var SoapClient
	 */
	private $client;

	/**
	 * @param SoapClient $client
	 * @param $apiKey
	 */
	public function __construct(SoapClient $client, $apiKey)
	{
		$this->client = $client;
		$this->apiKey = $apiKey;
	}

	/**
	 * returns Client
	 *
	 * @return \SoapClient
	 */
	public function getClient()
	{
		return $this->client;
	}

	/**
	 * returns Apikey
	 *
	 * @return string
	 */
	public function getApiKey()
	{
		return $this->apiKey;
	}

	/**
	 * returns predefined classes
	 *
	 * @return array
	 */
	public static function classmap()
	{
		$namespace = '\Rokde\Gsales\Api';
		return array(
			'Status' => $namespace . '\Types\Status',

			'File' => $namespace . '\Types\File',

			'Customer' => $namespace . '\Types\CustomerType',

			'Offer' => $namespace . '\Types\OfferType',
			'OfferBase' => $namespace . '\Types\Offer\Base',
			'OfferBaseFilterable' => $namespace . '\Types\Offer\BaseFilterable',
			'OfferPosition' => $namespace . '\Types\Offer\Position',
			'OfferSumm' => $namespace . '\Types\Offer\Sum',

			'Invoice' => $namespace . '\Types\InvoiceType',
			'InvoiceBase' => $namespace . '\Types\Invoice\Base',
			'InvoiceBaseFilterable' => $namespace . '\Types\Invoice\BaseFilterable',
			'InvoicePosition' => $namespace . '\Types\Invoice\Position',
			'InvoiceSumm' => $namespace . '\Types\Invoice\Sum',
			'DunningAction' => $namespace . '\Types\Invoice\DunningAction',

			'Refund' => $namespace . '\Types\RefundType',
			'RefundBase' => $namespace . '\Types\Refund\Base',
			'RefundBaseFilterable' => $namespace . '\Types\Refund\BaseFilterable',
			'RefundPosition' => $namespace . '\Types\Refund\Position',
			'RefundSumm' => $namespace . '\Types\Refund\Sum',

			'Contract' => $namespace . '\Types\ContractType',
			'ContractBase' => $namespace . '\Types\Contract\Base',
			'ContractBaseFilterable' => $namespace . '\Types\Contract\BaseFilterable',
			'ContractPosition' => $namespace . '\Types\Contract\Position',
			'ContractSumm' => $namespace . '\Types\Contract\Sum',

			'QueueEntry' => $namespace . '\Types\QueueType',

			'MailspoolEntry' => $namespace . '\Types\MailspoolType',
			'Attachement' => $namespace . '\Types\Attachment',

			'Newsletter' => $namespace . '\Types\NewsletterType',
			'NewsletterRecipient' => $namespace . '\Types\Newsletter\Recipient',

			'Article' => $namespace . '\Types\ArticleType',

			'Document' => $namespace . '\Types\DocumentType',
		);
	}

	/**
	 * finds an entity
	 *
	 * @param string $method
	 * @param string $paramName
	 * @param int|IdentifierInterface $identifier
	 * @return \Rokde\Gsales\Api\Types\Type
	 */
	protected function getEntity($method, $paramName, $identifier)
	{
		$id = ($identifier instanceof IdentifierInterface) ? $identifier->getId() : $identifier;

		return $this->call($method, [$paramName => $id]);
	}

	/**
	 * returns a collection by filter
	 *
	 * @param string $method
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 * @return \Rokde\Gsales\Api\Types\Type[]|\stdClass[]
	 */
	protected function getCollection($method, $filter, $sort, $limit, $offset)
	{
		$params = $this->prepareFilterParameter($filter, $sort, $limit, $offset, []);

		return $this->call($method, $params);
	}

	/**
	 * returns the count of a collection by filter
	 *
	 * @param string $method
	 * @param Filter[] $filter
	 * @return int
	 */
	protected function getCollectionCount($method, $filter)
	{
		$params = $this->prepareFilterOnlyParameter($filter, []);

		return $this->call($method, $params);
	}

	/**
	 * modifies the state of a refund
	 *
	 * @param string $method
	 * @param string $paramName
	 * @param int|\Rokde\Gsales\Api\Contracts\IdentifierInterface $identifier
	 * @return \Rokde\Gsales\Api\Types\Type
	 */
	protected function modifyState($method, $paramName, $identifier)
	{
		$id = ($identifier instanceof IdentifierInterface) ? $identifier->getId() : $identifier;

		return $this->call($method, [$paramName => $id]);
	}

	/**
	 * run the soap query
	 *
	 * @param string $method
	 * @param array $arguments
	 * @throws SoapApiException
	 * @return \stdClass|\Rokde\Gsales\Api\Types\Type|bool|int
	 */
	protected function call($method, array $arguments = array())
	{
		$arguments = array_merge(['apikey' => $this->getApiKey()], $arguments);

		$response = $this->client->__call($method, $arguments);

		if (isset($response['status'])) {
			/** @var Status $status */
			$status = $response['status'];
			if (!$status->isSuccessful()) {
				throw new SoapApiException($status->getMessage(), $status->getCode(), $this->client);
			}
		}

		return isset($response['result']) ? $response['result'] : $response;
	}

	/**
	 * prepares parameter filter, sort, recordcount and recordoffset
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 * @param array $params
	 * @return array
	 */
	private function prepareFilterParameter($filter, $sort, $limit, $offset, array $params = array())
	{
		if ($filter === null)
			return $params;

		$params = $this->prepareFilterOnlyParameter($filter, $params);
		if ($sort != null) {
			$params['sort'] = $sort;
			if ($limit != null) {
				$params['recordcount'] = $limit;

				if ($offset !== null) {
					$params['recordoffset'] = $offset;
				}
			}
		}

		return $params;
	}

	/**
	 * prepares parameter filter for api call
	 *
	 * @param Filter[] $filter
	 * @param array $params
	 * @return array
	 */
	private function prepareFilterOnlyParameter($filter, array $params = array())
	{
		if ($filter !== null) {
			$params['filter'] = $filter;
		}

		return $params;
	}
} 