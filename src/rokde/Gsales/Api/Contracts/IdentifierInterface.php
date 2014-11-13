<?php namespace Rokde\Gsales\Api\Contracts;

/**
 * Interface IdentifierInterface
 *
 * @package Rokde\Gsales\Api\Contracts
 */
interface IdentifierInterface
{
	/**
	 * returns an unique identifier for the object
	 *
	 * @return int
	 */
	public function getId();
}