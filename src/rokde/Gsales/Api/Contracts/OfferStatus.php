<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 10:33
 */

namespace Rokde\Gsales\Api\Contracts;


interface OfferStatus {

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