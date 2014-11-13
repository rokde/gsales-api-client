<?php namespace Rokde\Gsales\Api\Types\Base;

use Rokde\Gsales\Api\Types\Type;

/**
 * Class Sum
 *
 * @package Rokde\Gsales\Api\Types\Base
 */
class Sum extends Type
{
	/**
	 * @var float
	 */
	protected $net;

	/**
	 * @var float
	 */
	protected $discount;

	/**
	 * @var float
	 */
	protected $tax;

	/**
	 * @var float
	 */
	protected $gross;

	/**
	 * @var float
	 */
	protected $rounded_net;

	/**
	 * @var float
	 */
	protected $rounded_discount;

	/**
	 * @var float
	 */
	protected $rounded_tax;

	/**
	 * @var float
	 */
	protected $rounded_gross;

	/**
	 * @var float
	 */
	protected $rounded_curr_net;

	/**
	 * @var float
	 */
	protected $rounded_curr_discount;

	/**
	 * @var float
	 */
	protected $rounded_curr_tax;

	/**
	 * @var float
	 */
	protected $rounded_curr_gross;

	/**
	 * returns Discount
	 *
	 * @return float
	 */
	public function getDiscount()
	{
		return $this->discount;
	}

	/**
	 * returns Gross
	 *
	 * @return float
	 */
	public function getGross()
	{
		return $this->gross;
	}

	/**
	 * returns Net
	 *
	 * @return float
	 */
	public function getNet()
	{
		return $this->net;
	}

	/**
	 * returns RoundedCurrDiscount
	 *
	 * @return float
	 */
	public function getRoundedDiscountInForeignCurrency()
	{
		return $this->rounded_curr_discount;
	}

	/**
	 * returns RoundedCurrGross
	 *
	 * @return float
	 */
	public function getRoundedGrossInForeignCurrency()
	{
		return $this->rounded_curr_gross;
	}

	/**
	 * returns RoundedCurrNet
	 *
	 * @return float
	 */
	public function getRoundedNetInForeignCurrency()
	{
		return $this->rounded_curr_net;
	}

	/**
	 * returns RoundedCurrTax
	 *
	 * @return float
	 */
	public function getRoundedTaxInForeignCurrency()
	{
		return $this->rounded_curr_tax;
	}

	/**
	 * returns RoundedDiscount
	 *
	 * @return float
	 */
	public function getRoundedDiscount()
	{
		return $this->rounded_discount;
	}

	/**
	 * returns RoundedGross
	 *
	 * @return float
	 */
	public function getRoundedGross()
	{
		return $this->rounded_gross;
	}

	/**
	 * returns RoundedNet
	 *
	 * @return float
	 */
	public function getRoundedNet()
	{
		return $this->rounded_net;
	}

	/**
	 * returns RoundedTax
	 *
	 * @return float
	 */
	public function getRoundedTax()
	{
		return $this->rounded_tax;
	}

	/**
	 * returns Tax
	 *
	 * @return float
	 */
	public function getTax()
	{
		return $this->tax;
	}
}