<?php namespace Rokde\Gsales\Api\Types\Contract;

use DateTime;

/**
 * Class CreateContract
 *
 * @package Rokde\Gsales\Api\Types\Contract
 */
class CreateContract extends UpdateContract
{
	/**
	 * @var string date(Y-m-d)
	 */
	protected $start;

	/**
	 * @var int
	 */
	protected $endInMonths;

	/**
	 * sets start
	 *
	 * @param string $start
	 *
	 * @return $this
	 */
	public function setStart($start)
	{
		$this->start = $start;

		return $this;
	}

	/**
	 * returns Start
	 *
	 * @param bool $formatted
	 *
	 * @return string|DateTime
	 */
	public function getStart($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->start)->setTime(0, 0, 0);

		return $this->start;
	}

	/**
	 * sets endInMonths
	 *
	 * @param int $endInMonths
	 *
	 * @return $this
	 */
	public function setEndInMonths($endInMonths)
	{
		$this->endInMonths = $endInMonths;
		return $this;
	}

	/**
	 * returns EndInMonths
	 *
	 * @return int
	 */
	public function getEndInMonths()
	{
		return $this->endInMonths;
	}
}