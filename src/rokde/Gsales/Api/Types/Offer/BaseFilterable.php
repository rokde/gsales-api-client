<?php namespace Rokde\Gsales\Api\Types\Offer;

use DateTime;
use Rokde\Gsales\Api\Types\Base\Filterable;

/**
 * Class BaseFilterable
 *
 * @package Rokde\Gsales\Api\Types\Offer
 */
class BaseFilterable extends Filterable
{
	/**
	 * @var int
	 */
	protected $validuntil;

	/**
	 * sets valid until in days
	 *
	 * @param int $dayCount
	 *
	 * @return $this
	 */
	public function setValidUntil($dayCount)
	{
		$this->validuntil = $dayCount;
		return $this;
	}

	/**
	 * returns Valid until
	 *
	 * @return int
	 */
	public function getValidUntil()
	{
		return $this->validuntil;
	}
}