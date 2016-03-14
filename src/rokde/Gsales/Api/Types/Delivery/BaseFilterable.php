<?php namespace Rokde\Gsales\Api\Types\Delivery;

use DateTime;
use Rokde\Gsales\Api\Types\Base\Filterable;

/**
 * Class BaseFilterable
 *
 * @package Rokde\Gsales\Api\Types\Invoice
 */
class BaseFilterable extends Filterable
{
	/**
	 * @var string date(Y-m-d)
	 */
	protected $payable;

	/**
	 * @var string date(Y-m-d)
	 */
	protected $deliverydate;

	/**
	 * @var float
	 */
	protected $partialpayment;

	/**
	 * @var string
	 */
	protected $storno_txt;

	/**
	 * @var string
	 */
	protected $mediafinanz_file;

	/**
	 * sets deliverydate
	 *
	 * @param string $deliverydate
	 *
	 * @return $this
	 */
	public function setDeliveryDate($deliverydate)
	{
		$this->deliverydate = $deliverydate;
		return $this;
	}

	/**
	 * returns DeliveryDate
	 *
	 * @param bool $formatted
	 *
	 * @return string
	 */
	public function getDeliveryDate($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->deliverydate)->setTime(0, 0, 0);

		return $this->deliverydate;
	}

	/**
	 * sets mediafinanz file
	 *
	 * @param string $mediafinanz_file
	 *
	 * @return $this
	 */
	public function setMediafinanzFile($mediafinanz_file)
	{
		$this->mediafinanz_file = $mediafinanz_file;
		return $this;
	}

	/**
	 * returns Mediafinanz File
	 *
	 * @return string
	 */
	public function getMediafinanzFile()
	{
		return $this->mediafinanz_file;
	}

	/**
	 * sets partial payment
	 *
	 * @param float $partialpayment
	 *
	 * @return $this
	 */
	public function setPartialpayment($partialpayment)
	{
		$this->partialpayment = $partialpayment;
		return $this;
	}

	/**
	 * returns Partial payment
	 *
	 * @return float
	 */
	public function getPartialpayment()
	{
		return $this->partialpayment;
	}

	/**
	 * sets payable
	 *
	 * @param string $payable date(Y-m-d)
	 *
	 * @return $this
	 */
	public function setPayable($payable)
	{
		$this->payable = $payable;
		return $this;
	}

	/**
	 * returns Payable
	 *
	 * @param bool $formatted
	 *
	 * @return string
	 */
	public function getPayable($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->payable)->setTime(0, 0, 0);

		return $this->payable;
	}

	/**
	 * sets storno text
	 *
	 * @param string $storno_txt
	 *
	 * @return $this
	 */
	public function setStornoText($storno_txt)
	{
		$this->storno_txt = $storno_txt;
		return $this;
	}

	/**
	 * returns Storno Text
	 *
	 * @return string
	 */
	public function getStornoText()
	{
		return $this->storno_txt;
	}
}
