<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 15:31
 */

namespace Rokde\Gsales\Api\Types;


use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Refund\Base;
use Rokde\Gsales\Api\Types\Refund\Position;
use Rokde\Gsales\Api\Types\Refund\Sum;

class RefundType extends Type implements IdentifierInterface {

	/**
	 * base data
	 *
	 * @var Base
	 */
	private $base;

	/**
	 * position array
	 *
	 * @var Position[]
	 */
	private $pos;

	/**
	 * sum
	 *
	 * @var Sum
	 */
	private $summ;

	/**
	 * returns Base
	 *
	 * @return \Rokde\Gsales\Api\Types\Refund\Base
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * returns Pos
	 *
	 * @return \Rokde\Gsales\Api\Types\Refund\Position[]
	 */
	public function getPos()
	{
		return $this->pos;
	}

	/**
	 * returns Summ
	 *
	 * @return \Rokde\Gsales\Api\Types\Refund\Sum
	 */
	public function getSumm()
	{
		return $this->summ;
	}

	/**
	 * returns invoice id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->getBase()->getId();
	}
}