<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\File;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Delivery\Base;
use Rokde\Gsales\Api\Types\Delivery\BasePosition;
use Rokde\Gsales\Api\Types\Delivery\Position;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class Delivery
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Delivery extends Api
{
	/**
	 * returns an delivery by id
	 *
	 * @param int $deliveryId
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function get($deliveryId)
	{
		return $this->getEntity('getDelivery', 'deliveryid', $deliveryId);
	}

	/**
	 * returns deliverys by filter and ordering, pagination possible
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getDeliverys', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns number of deliverys by filter
	 *
	 * @param Filter[] $filter
	 *
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getDeliverysCount', $filter);
	}

	/**
	 * marks an delivery as paid
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType|int $delivery
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function paid($delivery)
	{
		return $this->modifyState('setDeliveryStatePaid', 'deliveryid', $delivery);
	}

	/**
	 * marks an delivery as open
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType|int $delivery
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function open($delivery)
	{
		return $this->modifyState('setDeliveryStateOpen', 'deliveryid', $delivery);
	}

	/**
	 * marks an delivery as canceled
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType|int $delivery
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function canceled($delivery)
	{
		return $this->modifyState('setDeliveryStateCanceled', 'deliveryid', $delivery);
	}

	/**
	 * creates a position within an delivery
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType|int $delivery
	 * @param BasePosition $position
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function createPosition($delivery, BasePosition $position)
	{
		$deliveryId = Type::getIdentifier($delivery);

		return $this->call('createDeliveryPosition', ['deliveryid' => $deliveryId, 'data' => $position]);
	}

	/**
	 * updates a position within an delivery
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType|int $delivery
	 * @param Position $position
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function updatePosition($delivery, Position $position)
	{
		$deliveryId = Type::getIdentifier($delivery);
		$positionId = $position->getId();

		return $this->call('updateDeliveryPosition', ['deliveryid' => $deliveryId, 'positionid' => $positionId, 'data' => $position]);
	}

	/**
	 * deletes a position from an delivery
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType|int $delivery
	 * @param Position|int $position
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function deletePosition($delivery, $position)
	{
		$deliveryId = Type::getIdentifier($delivery);
		$positionId = Type::getIdentifier($position);

		return $this->call('deleteDeliveryPosition', ['deliveryid' => $deliveryId, 'positionid' => $positionId]);
	}

	/**
	 * deletes an delivery
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType|int $delivery
	 *
	 * @return bool
	 */
	public function delete($delivery)
	{
		$deliveryId = Type::getIdentifier($delivery);

		return $this->call('deleteDelivery', ['deliveryid' => $deliveryId]);
	}

	/**
	 * creates an delivery for a customer
	 *
	 * @param Customer|int $customer
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function createForCustomer($customer)
	{
		$customerId = Type::getIdentifier($customer);

		return $this->call('createDeliveryForCustomer', ['customerid' => $customerId]);
	}

	/**
	 * creates an delivery
	 *
	 * @param Base $delivery
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function create(Base $delivery)
	{
		return $this->call('createDelivery', ['data' => $delivery]);
	}

	/**
	 * creates an delivery
	 *
	 * @param Base $delivery
	 *
	 * @return \Rokde\Gsales\Api\Types\DeliveryType
	 */
	public function update(Base $delivery)
	{
		$deliveryId = $delivery->getId();

		return $this->call('updateDelivery', ['deliveryid' => $deliveryId, 'data' => $delivery]);
	}

	/**
	 * adds delivery to mailspool
	 *
	 * @param \Rokde\Gsales\Api\Types\DeliveryType $delivery
	 *
	 * @return bool
	 */
	public function addToMailspool($delivery)
	{
		$deliveryId = Type::getIdentifier($delivery);

		return $this->call('addDeliveryToMailspool', ['deliveryid' => $deliveryId]);
	}

	/**
	 * returns pdf file of delivery
	 *
	 * @param $delivery
	 *
	 * @return File
	 */
	public function pdf($delivery)
	{
		$deliveryId = Type::getIdentifier($delivery);

		return $this->call('getDeliveryPDF', ['deliveryid' => $deliveryId]);
	}
}
