<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\File;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Invoice\Base as InvoiceBase;
use Rokde\Gsales\Api\Types\Invoice\Position as InvoicePosition;
use Rokde\Gsales\Api\Types\InvoiceType;
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
		$offerId = Type::getIdentifier($offer);

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
		$offerId = Type::getIdentifier($offer);
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
		$offerId = Type::getIdentifier($offer);
		$positionId = Type::getIdentifier($position);

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
		$offerId = Type::getIdentifier($offer);

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
		$customerId = Type::getIdentifier($customer);

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
		$offerId = Type::getIdentifier($offer);

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
		$offerId = Type::getIdentifier($offer);

		return $this->call('getOfferPDF', ['offerid' => $offerId]);
	}

	/**
	 * converts a stored offer to an invoice
	 *
	 * when giving an invoice context the invoice will be stored already
	 *
	 * @param OfferType|int $offer
	 * @param Invoice $invoiceContext
	 *
	 * @return InvoiceBase|InvoiceType
	 */
	public function convertToInvoice($offer, Invoice $invoiceContext = null)
	{
		if ( ! $offer instanceof OfferType)
		{
			$offer = $this->get($offer);
		}

		//  convert all offer data to an invoice
		$invoice = new InvoiceBase();

		//  set data from offer base
		$offerBase = $offer->getBase();
		$invoice->setIntroductionText($offerBase->getIntroductionText())
			->setClosingText($offerBase->getClosingText())

			->setAmount($offerBase->getAmount())
			->setNetAmount($offerBase->getNetAmount())

			->setCurrencyId($offerBase->getCurrencyId())
			->setCurrencyRate($offerBase->getCurrencyRate())
			->setCurrencySymbol($offerBase->getCurrencySymbol())

			->setCustom1($offerBase->getCustom1())
			->setCustom2($offerBase->getCustom2())
			->setCustom3($offerBase->getCustom3())
			->setCustom4($offerBase->getCustom4())
			->setCustom5($offerBase->getCustom5())

			->setCustomerCompany($offerBase->getCustomerCompany())
			->setCustomerTitle($offerBase->getCustomerTitle())
			->setCustomerFirstname($offerBase->getCustomerFirstname())
			->setCustomerLastname($offerBase->getCustomerLastname())
			->setCustomerAddress($offerBase->getCustomerAddress())
			->setCustomerZip($offerBase->getCustomerZip())
			->setCustomerCity($offerBase->getCustomerCity())
			->setCustomerCountry($offerBase->getCustomerCountry())

			->setCustomerId($offerBase->getCustomerId())
			->setCustomerNumber($offerBase->getCustomerNumber())

			->setPrintContactPerson($offerBase->canPrintContactPerson())

			->setTemplate($offerBase->getTemplate());

		if ($invoiceContext === null)
			return $invoice;

		$createdInvoice = $invoiceContext->create($invoice);

		return $createdInvoice;
	}

	/**
	 * converts the offer positions to invoice positions
	 *
	 * when giving an invoice context the invoice positions will be stored already
	 *
	 * @param OfferType|int $offer
	 *
	 * @param InvoiceType|int $invoice
	 * @param Invoice $invoiceContext
	 *
	 * @return InvoicePosition[]
	 */
	public function convertToInvoicePositions($offer, $invoice = null, Invoice $invoiceContext = null)
	{
		if ( ! $offer instanceof OfferType)
		{
			$offer = $this->get($offer);
		}

		$invoicePositions = array();

		$offerPositions = $offer->getPositions();
		foreach ($offerPositions as $position)
		{
			$invoicePosition = new InvoicePosition();
			$invoicePosition->setDiscount($position->getDiscount())
				->setPositionText($position->getPositionText())
				->setPrice($position->getPrice())
				->setQuantity($position->getQuantity())
				->setTax($position->getTax())
				->setUnit($position->getUnit());

			if ($invoice !== null && $invoiceContext !== null)
			{
				$invoiceContext->createPosition($invoice, $invoicePosition);
			}

			$invoicePositions[] = $invoicePosition;
		}

		return $invoicePositions;
	}
}