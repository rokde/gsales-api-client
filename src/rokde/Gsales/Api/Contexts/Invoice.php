<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 15:11
 */

namespace Rokde\Gsales\Api\Contexts;


use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\File;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\InvoiceType;
use Rokde\Gsales\Api\Types\Invoice\Base;
use Rokde\Gsales\Api\Types\Invoice\BasePosition;
use Rokde\Gsales\Api\Types\Invoice\Position;
use Rokde\Gsales\Api\Types\Sort;

class Invoice extends Api {

	/**
	 * returns an invoice by id
	 *
	 * @param int $invoiceId
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function get($invoiceId)
	{
		return $this->getEntity('getInvoice', 'invoiceid', $invoiceId);
	}

	/**
	 * returns invoices by filter and ordering, pagination possible
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 * @return \Rokde\Gsales\Api\Types\InvoiceType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getInvoices', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns number of invoices by filter
	 *
	 * @param Filter[] $filter
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getInvoicesCount', $filter);
	}

	/**
	 * marks an invoice as paid
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType|int $invoice
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function paid($invoice)
	{
		return $this->modifyState('setInvoiceStatePaid', 'invoiceid', $invoice);
	}

	/**
	 * marks an invoice as open
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType|int $invoice
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function open($invoice)
	{
		return $this->modifyState('setInvoiceStateOpen', 'invoiceid', $invoice);
	}

	/**
	 * marks an invoice as canceled
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType|int $invoice
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function canceled($invoice)
	{
		return $this->modifyState('setInvoiceStateCanceled', 'invoiceid', $invoice);
	}

	/**
	 * creates a position within an invoice
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType|int $invoice
	 * @param BasePosition $position
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function createPosition($invoice, BasePosition $position)
	{
		$invoiceId = ($invoice instanceof InvoiceType) ? $invoice->getId() : $invoice;

		return $this->call('createInvoicePosition', ['invoiceid' => $invoiceId, 'data' => $position]);
	}

	/**
	 * updates a position within an invoice
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType|int $invoice
	 * @param Position $position
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function updatePosition($invoice, Position $position)
	{
		$invoiceId = ($invoice instanceof InvoiceType) ? $invoice->getId() : $invoice;
		$positionId = $position->getId();

		return $this->call('updateInvoicePosition', ['invoiceid' => $invoiceId, 'positionid' => $positionId, 'data' => $position]);
	}

	/**
	 * deletes a position from an invoice
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType|int $invoice
	 * @param Position|int $position
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function deletePosition($invoice, $position)
	{
		$invoiceId = ($invoice instanceof InvoiceType) ? $invoice->getId() : $invoice;
		$positionId = ($invoice instanceof Position) ? $position->getId() : $position;

		return $this->call('deleteInvoicePosition', ['invoiceid' => $invoiceId, 'positionid' => $positionId]);
	}

	/**
	 * deletes an invoice
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType|int $invoice
	 * @return bool
	 */
	public function delete($invoice)
	{
		$invoiceId = ($invoice instanceof InvoiceType) ? $invoice->getId() : $invoice;

		return $this->call('deleteInvoice', ['invoiceid' => $invoiceId]);
	}

	/**
	 * creates an invoice for a customer
	 *
	 * @param Customer|int $customer
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function createForCustomer($customer)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;

		return $this->call('createInvoiceForCustomer', ['customerid' => $customerId]);
	}

	/**
	 * creates an invoice
	 *
	 * @param Base $invoice
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function create(Base $invoice)
	{
		return $this->call('createInvoice', ['data' => $invoice]);
	}

	/**
	 * creates an invoice
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType $invoice
	 * @return \Rokde\Gsales\Api\Types\InvoiceType
	 */
	public function update(InvoiceType $invoice)
	{
		$invoiceId = $invoice->getId();

		return $this->call('updateInvoice', ['invoiceid' => $invoiceId, 'data' => $invoice]);
	}

	/**
	 * adds invoice to mailspool
	 *
	 * @param \Rokde\Gsales\Api\Types\InvoiceType $invoice
	 * @return bool
	 */
	public function addToMailspool($invoice)
	{
		$invoiceId = ($invoice instanceof InvoiceType) ? $invoice->getId() : $invoice;

		return $this->call('addInvoiceToMailspool', ['invoiceid' => $invoiceId]);
	}

	/**
	 * returns pdf file of invoice
	 *
	 * @param $invoice
	 * @return File
	 */
	public function pdf($invoice)
	{
		$invoiceId = ($invoice instanceof InvoiceType) ? $invoice->getId() : $invoice;

		return $this->call('getInvoicePDF', ['invoiceid' => $invoiceId]);
	}
}