<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 14:25
 */

namespace Rokde\Gsales\Api\Types\Contract;


use Rokde\Gsales\Api\Types\Base\Position;

class BasePosition extends Position {

	/**
	 * @var int
	 */
	protected $not_per_interval;

	/**
	 * sets not_per_interval
	 *
	 * @param bool $flag
	 * @return $this
	 */
	public function setNotPerInterval($flag = true)
	{
		$this->not_per_interval = $flag ? 1 : 0;
		return $this;
	}

	/**
	 * returns NotPerInterval
	 *
	 * @return bool
	 */
	public function isNotPerInterval()
	{
		return ($this->not_per_interval == 1);
	}
} 