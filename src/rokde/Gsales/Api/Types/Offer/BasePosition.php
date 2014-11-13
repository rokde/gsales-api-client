<?php namespace Rokde\Gsales\Api\Types\Offer;

use Rokde\Gsales\Api\Types\Base\Position;

/**
 * Class BasePosition
 *
 * @package Rokde\Gsales\Api\Types\Offer
 */
class BasePosition extends Position
{
	/**
	 * @var bool
	 */
	protected $optional;

	/**
	 * sets optional
	 *
	 * @param bool $flag
	 *
	 * @internal param bool $optional
	 * @return $this
	 */
	public function setOptional($flag = true)
	{
		$this->optional = $flag;
		return $this;
	}

	/**
	 * returns Optional
	 *
	 * @return boolean
	 */
	public function isOptional()
	{
		return $this->optional;
	}
}