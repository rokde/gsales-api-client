<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;

/**
 * Class Document
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Document extends Api
{
	/**
	 * fetches a single document by id
	 *
	 * @param int $documentId
	 *
	 * @return \Rokde\Gsales\Api\Types\DocumentType
	 */
	public function get($documentId)
	{
		return $this->getEntity('getCustomerDocument', 'documentid', $documentId);
	}

	/**
	 * returns a collection of documents, filtered, sorted, paginated
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 *
	 * @return \Rokde\Gsales\Api\Types\DocumentType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getCustomerDocuments', $filter, $sort, $limit, $offset);
	}

	/**
	 * fetches a single document by id
	 *
	 * @param int $documentId
	 *
	 * @return \Rokde\Gsales\Api\Types\File
	 */
	public function file($documentId)
	{
		return $this->call('getDocumentFile', ['documentid' => $documentId]);
	}
}