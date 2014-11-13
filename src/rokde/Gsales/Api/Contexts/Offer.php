<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\File;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Offer\Base;
use Rokde\Gsales\Api\Types\Offer\BasePosition;
use Rokde\Gsales\Api\Types\Offer\Position;
use Rokde\Gsales\Api\Types\OfferType;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class Offer
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Offer extends Api
{
	/**
	 * fetches an offer by id
	 *
	 * @param int $offerId
	 *
	 * @return OfferType
	 */
	public function get($offerId)
	{
		return $this->getEntity('getOffer', 'offerid', $offerId);
	}

	/**
	 * fetches offers, by optional filters and sorting, paginating also supported
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param null $limit
	 * @param null $offset
	 *
	 * @return OfferType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getOffers', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns number of offers by given filter
	 *
	 * @param Filter[] $filter
	 *
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getOffersCount', $filter);
	}

	/**
	 * accepts an offer
	 *
	 * @param OfferType|int $offer
	 *
	 * @return OfferType
	 */
	public function accept($offer)
	{
		return $this->modifyState('setOfferStateAccepted', 'offerid', $offer);
	}

	/**
	 * declines an offer
	 *
	 * @param OfferType|int $offer
	 *
	 * @return OfferType
	 */
	public function declined($offer)
	{
		return $this->modifyState('setOfferStateDeclined', 'offerid', $offer);
	}

	/**
	 * marks an offer as open
	 *
	 * @param OfferType|int $offer
	 *
	 * @return OfferType
	 */
	public function open($offer)
	{
		return $this->modifyState('setOfferStateOpen', 'offerid', $offer);
	}

	/**
	 * marks an offer as billed
	 *
	 * @param OfferType|int $offer
	 *
	 * @return OfferType
	 */
	public function billed($offer)
	{
		return $this->modifyState('setOfferStateBilled', 'offerid', $offer);
	}

	/**
	 * creates a position within an offer
	 *
	 * @param OfferType|int $offer
	 * @param \Rokde\Gsales\Api\Types\Offer\BasePosition $position
	 *
	 * @return OfferType
	 */
	public function createPosition($offer, BasePosition $position)
	{
		$offerId = Type::getId($offer);

		return $this->call('createOfferPosition', ['offerid' => $offerId, 'data' => $position]);
	}

	/**
	 * updates a position within an offer
	 *
	 * @param OfferType|int $offer
	 * @param \Rokde\Gsales\Api\Types\Offer\Position $position
	 *
	 * @return OfferType
	 */
	public function updatePosition($offer, Position $position)
	{
		$offerId = Type::getId($offer);
		$positionId = $position->getId();

		return $this->call('updateOfferPosition', ['offerid' => $offerId, 'positionid' => $positionId, 'data' => $position]);
	}

	/**
	 * deletes a position within an offer
	 *
	 * @param OfferType|int $offer
	 * @param \Rokde\Gsales\Api\Types\Offer\Position|int $position
	 *
	 * @return OfferType
	 */
	public function deletePosition($offer, $position)
	{
		$offerId = Type::getId($offer);
		$positionId = Type::getId($position);

		return $this->call('deleteOfferPosition', ['offerid' => $offerId, 'positionid' => $positionId]);
	}

	/**
	 * deletes an offer
	 *
	 * @param OfferType|int $offer
	 *
	 * @return bool
	 */
	public function delete($offer)
	{
		$offerId = Type::getId($offer);

		return $this->call('deleteOffer', ['offerid' => $offerId]);
	}

	/**
	 * creates an offer for a customer
	 *
	 * @param CustomerType|int $customer
	 *
	 * @return OfferType
	 */
	public function createForCustomer($customer)
	{
		$customerId = Type::getId($customer);

		return $this->call('createOfferForCustomer', ['customerid' => $customerId]);
	}

	/**
	 * creates an offer for a customer
	 *
	 * @param \Rokde\Gsales\Api\Types\Offer\Base $offer
	 *
	 * @return OfferType
	 */
	public function create(Base $offer)
	{
		return $this->call('createOffer', ['data' => $offer]);
	}

	/**
	 * creates an offer for a customer
	 *
	 * @param \Rokde\Gsales\Api\Types\OfferType $offer
	 *
	 * @return OfferType
	 */
	public function update(OfferType $offer)
	{
		$offerId = $offer->getId();
		$offerData = $offer->getBase();

		return $this->call('updateOffer', ['offerid' => $offerId, 'data' => $offerData]);
	}

	/**
	 * adds offer to mailspool
	 *
	 * @param OfferType|int $offer
	 *
	 * @return bool
	 */
	public function addToMailspool($offer)
	{
		$offerId = Type::getId($offer);

		return $this->call('updateOffer', ['offerid' => $offerId]);
	}

	/**
	 * returns pdf for offer
	 *
	 * @param OfferType|int $offer
	 *
	 * @return File
	 */
	public function pdf($offer)
	{
		$offerId = Type::getId($offer);

		return $this->call('getOfferPDF', ['offerid' => $offerId]);
	}
}