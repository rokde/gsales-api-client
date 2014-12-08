<?php namespace Rokde\Gsales\Api\Contracts;

/**
 * Interface InvoiceStatus
 *
 * @package rokde\Gsales\Api\Contracts
 */
interface InvoiceStatus
{
	/**
	 * an invoice is open
	 */
	const OPEN = 0;

	/**
	 * an invoice was billed
	 */
	const BILLED = 1;
}