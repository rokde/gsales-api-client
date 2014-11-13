<?php namespace Rokde\Gsales\Api\Contracts;

/**
 * Interface OfferStatus
 *
 * @package Rokde\Gsales\Api\Contracts
 */
interface OfferStatus
{
	/**
	 * an offer is open
	 */
	const OPEN = 0;

	/**
	 * an offer was declined
	 */
	const DECLINED = 1;

	/**
	 * an offer was approved
	 */
	const APPROVED = 2;
}