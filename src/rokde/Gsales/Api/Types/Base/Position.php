<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 16:21
 */

namespace Rokde\Gsales\Api\Types\Base;


use Rokde\Gsales\Api\Types\Type;

class Position extends Type {

	/**
	 * @var float
	 */
	protected $quantity;

	/**
	 * @var string
	 */
	protected $unit;

	/**
	 * @var string
	 */
	protected $pos_txt;

	/**
	 * @var float
	 */
	protected $price;

	/**
	 * @var float
	 */
	protected $discount;

	/**
	 * @var float
	 */
	protected $tax;

	/**
	 * @var bool
	 */
	protected $useDefaultTax = true;

	/**
	 * sets discount
	 *
	 * @param float $discount
	 * @return $this
	 */
	public function setDiscount($discount)
	{
		$this->discount = $discount;
		return $this;
	}

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
	 * sets PositionText
	 *
	 * @param string $pos_txt
	 * @return $this
	 */
	public function setPositionText($pos_txt)
	{
		$this->pos_txt = $pos_txt;
		return $this;
	}

	/**
	 * returns PositionText
	 *
	 * @return string
	 */
	public function getPositionText()
	{
		return $this->pos_txt;
	}

	/**
	 * sets price
	 *
	 * @param float $price
	 * @return $this
	 */
	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * returns Price
	 *
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * sets quantity
	 *
	 * @param float $quantity
	 * @return $this
	 */
	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}

	/**
	 * returns Quantity
	 *
	 * @return float
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * sets tax
	 *
	 * @param float $tax
	 * @return $this
	 */
	public function setTax($tax)
	{
		$this->tax = $tax;
		return $this;
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

	/**
	 * sets unit
	 *
	 * @param string $unit
	 * @return $this
	 */
	public function setUnit($unit)
	{
		$this->unit = $unit;
		return $this;
	}

	/**
	 * returns Unit
	 *
	 * @return string
	 */
	public function getUnit()
	{
		return $this->unit;
	}

	/**
	 * sets useDefaultTax
	 *
	 * @param bool $flag
	 * @internal param bool $useDefaultTax
	 * @return $this
	 */
	public function useDefaultTax($flag = true)
	{
		$this->useDefaultTax = $flag;
		return $this;
	}

	/**
	 * returns UseDefaultTax
	 *
	 * @return boolean
	 */
	public function isDefaultTaxUsed()
	{
		return $this->useDefaultTax;
	}

} 