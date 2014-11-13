<?php namespace Rokde\Gsales\Api\Types;

use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Invoice\Base;
use Rokde\Gsales\Api\Types\Invoice\DunningAction;
use Rokde\Gsales\Api\Types\Invoice\Position;
use Rokde\Gsales\Api\Types\Invoice\Sum;

/**
 * Class InvoiceType
 * @package Rokde\Gsales\Api\Types
 */
class InvoiceType extends Type implements IdentifierInterface
{
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
	 * dunning actions
	 *
	 * @var DunningAction[]
	 */
	private $dunning;

	/**
	 * returns Base
	 *
	 * @return \Rokde\Gsales\Api\Types\Invoice\Base
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * returns Dunning
	 *
	 * @return \Rokde\Gsales\Api\Types\Invoice\DunningAction[]
	 */
	public function getDunning()
	{
		return $this->dunning;
	}

	/**
	 * returns Pos
	 *
	 * @return \Rokde\Gsales\Api\Types\Invoice\Position[]
	 */
	public function getPos()
	{
		return $this->pos;
	}

	/**
	 * returns Summ
	 *
	 * @return \Rokde\Gsales\Api\Types\Invoice\Sum
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