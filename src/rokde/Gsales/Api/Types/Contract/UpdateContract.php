<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 14:38
 */

namespace Rokde\Gsales\Api\Types\Contract;


use Rokde\Gsales\Api\Contracts\SeriesArt;
use Rokde\Gsales\Api\Types\Type;

class UpdateContract extends Type {

	/**
	 * @var int
	 */
	protected $series_art;

	/**
	 * @var int
	 */
	protected $interval;

	/**
	 * @var string
	 */
	protected $custom1;

	/**
	 * @var string
	 */
	protected $custom2;

	/**
	 * @var string
	 */
	protected $custom3;

	/**
	 * @var string
	 */
	protected $custom4;

	/**
	 * @var string
	 */
	protected $custom5;

	/**
	 * sets interval
	 *
	 * @param int $interval
	 * @return $this
	 */
	public function setInterval($interval)
	{
		$this->interval = $interval;
		return $this;
	}

	/**
	 * returns Interval
	 *
	 * @return int
	 */
	public function getInterval()
	{
		return $this->interval;
	}

	/**
	 * sets series_art in advance
	 *
	 * @internal param int $series_art
	 * @return $this
	 */
	public function setSeriesArtInAdvance()
	{
		$this->series_art = SeriesArt::IN_ADVANCE;
		return $this;
	}

	/**
	 * sets series_art afterwards
	 *
	 * @internal param int $series_art
	 * @return $this
	 */
	public function setSeriesArtAfterwards()
	{
		$this->series_art = SeriesArt::AFTERWARDS;
		return $this;
	}

	/**
	 * returns SeriesArt
	 *
	 * @return int
	 */
	public function getSeriesArt()
	{
		return $this->series_art;
	}

	/**
	 * returns custom1
	 *
	 * @return string
	 */
	public function getCustom1()
	{
		return $this->custom1;
	}

	/**
	 * sets custom1
	 *
	 * @param string $custom1
	 * @return $this
	 */
	public function setCustom1($custom1)
	{
		$this->custom1 = $custom1;

		return $this;
	}

	/**
	 * returns custom2
	 *
	 * @return string
	 */
	public function getCustom2()
	{
		return $this->custom2;
	}

	/**
	 * sets custom2
	 *
	 * @param string $custom2
	 * @return $this
	 */
	public function setCustom2($custom2)
	{
		$this->custom2 = $custom2;

		return $this;
	}

	/**
	 * returns custom3
	 *
	 * @return string
	 */
	public function getCustom3()
	{
		return $this->custom3;
	}

	/**
	 * sets custom3
	 *
	 * @param string $custom3
	 * @return $this
	 */
	public function setCustom3($custom3)
	{
		$this->custom3 = $custom3;

		return $this;
	}

	/**
	 * returns custom4
	 *
	 * @return string
	 */
	public function getCustom4()
	{
		return $this->custom4;
	}

	/**
	 * sets custom4
	 *
	 * @param string $custom4
	 * @return $this
	 */
	public function setCustom4($custom4)
	{
		$this->custom4 = $custom4;

		return $this;
	}

	/**
	 * returns custom5
	 *
	 * @return string
	 */
	public function getCustom5()
	{
		return $this->custom5;
	}

	/**
	 * sets custom5
	 *
	 * @param string $custom5
	 * @return $this
	 */
	public function setCustom5($custom5)
	{
		$this->custom5 = $custom5;

		return $this;
	}
} 