<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\File;
use Rokde\Gsales\Api\Types\Refund\Base;
use Rokde\Gsales\Api\Types\Refund\BasePosition;
use Rokde\Gsales\Api\Types\Refund\Position;
use Rokde\Gsales\Api\Types\RefundType;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class Refund
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Refund extends Api
{
	/**
	 * returns a refund by id
	 *
	 * @param int $refundId
	 *
	 * @return \Rokde\Gsales\Api\Types\RefundType
	 */
	public function get($refundId)
	{
		return $this->getEntity('getRefund', 'refundid', $refundId);
	}

	/**
	 * returns invoices by filter and ordering, pagination possible
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 *
	 * @return \Rokde\Gsales\Api\Types\RefundType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getRefunds', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns number of invoices by filter
	 *
	 * @param Filter[] $filter
	 *
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getRefundsCount', $filter);
	}

	/**
	 * marks a refund as paid
	 *
	 * @param int|\Rokde\Gsales\Api\Types\RefundType $refund
	 *
	 * @return \Rokde\Gsales\Api\Types\RefundType
	 */
	public function paid($refund)
	{
		return $this->modifyState('setRefundStatePaid', 'refundid', $refund);
	}

	/**
	 * marks a refund as canceled
	 *
	 * @param int|\Rokde\Gsales\Api\Types\RefundType $refund
	 *
	 * @return \Rokde\Gsales\Api\Types\RefundType
	 */
	public function canceled($refund)
	{
		return $this->modifyState('setRefundStateCanceled', 'refundid', $refund);
	}

	/**
	 * marks a refund as open
	 *
	 * @param int|\Rokde\Gsales\Api\Types\RefundType $refund
	 *
	 * @return \Rokde\Gsales\Api\Types\RefundType
	 */
	public function open($refund)
	{
		return $this->modifyState('setRefundStateOpen', 'refundid', $refund);
	}

	/**
	 * creates a position on a refund
	 *
	 * @param RefundType|int $refund
	 * @param \Rokde\Gsales\Api\Types\Refund\BasePosition $position
	 *
	 * @return RefundType
	 */
	public function createPosition($refund, BasePosition $position)
	{
		$refundId = Type::getIdentifier($refund);

		return $this->call('createRefundPosition', ['refundid' => $refundId, 'data' => $position]);
	}

	/**
	 * updates a position on a refund
	 *
	 * @param RefundType|int $refund
	 * @param Position $position
	 *
	 * @return RefundType
	 */
	public function updatePosition($refund, Position $position)
	{
		$refundId = Type::getIdentifier($refund);
		$positionId = $position->getId();

		return $this->call('updateRefundPosition', ['refundid' => $refundId, 'positionid' => $positionId, 'data' => $position]);
	}

	/**
	 * deletes a position on a refund
	 *
	 * @param RefundType|int $refund
	 * @param Position $position
	 *
	 * @return RefundType
	 */
	public function deletePosition($refund, Position $position)
	{
		$refundId = Type::getIdentifier($refund);
		$positionId = $position->getId();

		return $this->call('deleteRefundPosition', ['refundid' => $refundId, 'positionid' => $positionId]);
	}

	/**
	 * deletes a refund
	 *
	 * @param RefundType|int $refund
	 *
	 * @return bool
	 */
	public function delete($refund)
	{
		$refundId = Type::getIdentifier($refund);

		return $this->call('deleteRefund', ['refundid' => $refundId]);
	}

	/**
	 * creates a refund for customer
	 *
	 * @param int|\Rokde\Gsales\Api\Types\CustomerType $customer
	 *
	 * @return RefundType
	 */
	public function createForCustomer($customer)
	{
		$customerId = Type::getIdentifier($customer);

		return $this->call('createRefundForCustomer', ['customerid' => $customerId]);
	}

	/**
	 * creates a refund
	 *
	 * @param Base $refund
	 *
	 * @return RefundType
	 */
	public function create(Base $refund)
	{
		return $this->call('createRefund', ['data' => $refund]);
	}

	/**
	 * updates a refund
	 *
	 * @param RefundType $refund
	 *
	 * @return RefundType
	 */
	public function update(RefundType $refund)
	{
		$refundId = $refund->getId();

		return $this->call('updateRefund', ['refundid' => $refundId, 'data' => $refund]);
	}

	/**
	 * adds refund to mailspool
	 *
	 * @param RefundType|int $refund
	 *
	 * @return bool
	 */
	public function addToMailspool($refund)
	{
		$refundId = Type::getIdentifier($refund);

		return $this->call('updateOffer', ['refundid' => $refundId]);
	}

	/**
	 * returns pdf for refund
	 *
	 * @param RefundType|int $refund
	 *
	 * @return File
	 */
	public function pdf($refund)
	{
		$refundId = Type::getIdentifier($refund);

		return $this->call('getOfferPDF', ['refundid' => $refundId]);
	}
}