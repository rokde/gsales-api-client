<?php namespace Rokde\Gsales\Api\Contracts;

/**
 * Interface MailFormat
 *
 * @package Rokde\Gsales\Api\Contracts
 */
interface MailFormat
{
	const HTML_AND_PLAINTEXT = 0;
	const PLAINTEXT_ONLY = 1;
	const HTML_ONLY = 2;
}