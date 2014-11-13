<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\InvoiceType;
use Rokde\Gsales\Api\Types\Queue\Base;
use Rokde\Gsales\Api\Types\QueueType;
use Rokde\Gsales\Api\Types\Sort;

/**
 * Class Queue
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Queue extends Api
{
	/**
	 * returns a queue entry by id
	 *
	 * @param int $queueId
	 *
	 * @return \Rokde\Gsales\Api\Types\QueueType
	 */
	public function get($queueId)
	{
		return $this->getEntity('getQueueEntry', 'queueid', $queueId);
	}

	/**
	 * returns a collection of queue entries, filtered, sorted, paginated
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 *
	 * @return \Rokde\Gsales\Api\Types\QueueType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getQueueEntries', $filter, $sort, $limit, $offset);
	}

	/**
	 * return the number of queue entries getting by filter
	 *
	 * @param Filter[] $filter
	 *
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getQueueEntriesCount', $filter);
	}

	/**
	 * create a new queue entry
	 *
	 * @param Base $queueEntry
	 *
	 * @return QueueType
	 */
	public function create(Base $queueEntry)
	{
		return $this->call('createQueueEntry', ['data' => $queueEntry]);
	}

	/**
	 * updates a queue entry
	 *
	 * @param \Rokde\Gsales\Api\Types\QueueType $queueEntry
	 *
	 * @return QueueType
	 */
	public function update(QueueType $queueEntry)
	{
		$queueId = $queueEntry->getId();

		return $this->call('updateQueueEntry', ['queueid' => $queueId, 'data' => $queueEntry]);
	}

	/**
	 * updates a queue entry
	 *
	 * @param int|\Rokde\Gsales\Api\Types\QueueType $queueEntry
	 *
	 * @return bool
	 */
	public function delete($queueEntry)
	{
		$queueId = ($queueEntry instanceof QueueType) ? $queueEntry->getId() : $queueEntry;

		return $this->call('deleteQueueEntry', ['queueid' => $queueId]);
	}

	/**
	 * approve queue entry for automatic processing
	 *
	 * @param int|QueueType $queueEntry
	 *
	 * @return QueueType
	 */
	public function auto($queueEntry)
	{
		return $this->modifyState('setQueueEntryStateAuto', 'queueid', $queueEntry);
	}

	/**
	 * approve queue entry for automatic processing
	 *
	 * @param int|QueueType $queueEntry
	 *
	 * @return QueueType
	 */
	public function manual($queueEntry)
	{
		return $this->modifyState('setQueueEntryStateManual', 'queueid', $queueEntry);
	}

	/**
	 * approve queue entry for automatic processing
	 *
	 * @param int|QueueType $queueEntry
	 *
	 * @return QueueType
	 */
	public function noApproval($queueEntry)
	{
		return $this->modifyState('setQueueEntryStateNoApproval', 'queueid', $queueEntry);
	}

	/**
	 * creates an invoice from all queue entries for a given customer
	 *
	 * @param int|CustomerType $customer
	 *
	 * @return InvoiceType
	 */
	public function createInvoice($customer)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;

		return $this->call('createInvoiceFromQueueForCustomer', ['customerid' => $customerId]);
	}

	/**
	 * creates for all queue entries an invoice per customer
	 *
	 * @return InvoiceType[]
	 */
	public function createInvoices()
	{
		return $this->call('createInvoicesFromQueueForAll');
	}
}