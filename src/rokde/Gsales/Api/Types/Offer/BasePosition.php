<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 11:03
 */

namespace Rokde\Gsales\Api\Types\Offer;


use Rokde\Gsales\Api\Types\Base\Position;

class BasePosition extends Position {

	/**
	 * @var bool
	 */
	protected $optional;

	/**
	 * sets optional
	 *
	 * @param bool $flag
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