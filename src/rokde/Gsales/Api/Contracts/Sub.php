<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 12:03
 */

namespace Rokde\Gsales\Api\Contracts;


interface Sub {

	const CUSTOMER = 'subcustomer';
	const LETTER = 'subletter';
	const OFFER = 'suboffer';
	const CONTRACT = 'subcontract';
	const INVOICE = 'subinvoice';
	const REFUND = 'subrefund';
}