<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 14:03
 */

namespace Rokde\Gsales\Api\Types;


use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Contract\Base;
use Rokde\Gsales\Api\Types\Contract\Position;
use Rokde\Gsales\Api\Types\Contract\Sum;

class ContractType extends Type implements IdentifierInterface {

	/**
	 * @var Base
	 */
	private $base;

	/**
	 * @var Position[]
	 */
	private $pos;

	/**
	 * @var Sum
	 */
	private $sum;

	/**
	 * returns the id of the offer
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->getBase()->getId();
	}

	/**
	 * @param Sum $sum
	 */
	public function setSum(Sum $sum)
	{
		$this->sum = $sum;
	}

	/**
	 * @return Sum
	 */
	public function getSum()
	{
		return $this->sum;
	}

	/**
	 * @param Base $base
	 */
	public function setBase(Base $base)
	{
		$this->base = $base;
	}

	/**
	 * @return Base
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * sets positions
	 *
	 * @param \Rokde\Gsales\Api\Types\Contract\Position[] $pos
	 * @return $this
	 */
	public function setPositions($pos)
	{
		$this->pos = $pos;
		return $this;
	}

	/**
	 * returns Positions
	 *
	 * @return \Rokde\Gsales\Api\Types\Contract\Position[]
	 */
	public function getPositions()
	{
		return $this->pos;
	}

	/**
	 * adds a position
	 *
	 * @param Position $position
	 * @return $this
	 */
	public function addPosition(Position $position)
	{
		$this->pos[] = $position;

		return $this;
	}
} 