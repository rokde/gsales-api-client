<?php namespace Rokde\Gsales\Api\Contracts;

/**
 * Interface Approval
 *
 * Defines the approval levels
 *
 * @package Rokde\Gsales\Api\Contracts
 */
interface Approval
{
	const NOT_APPROVED = 0;
	const APPROVED_FOR_MANUAL_PROCESSING = 1;
	const APPROVED_FOR_AUTOMATIC_PROCESSING = 2;
}