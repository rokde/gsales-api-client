<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 11:28
 */

namespace Rokde\Gsales\Api\Types\Article;


use Rokde\Gsales\Api\Types\Type;

class Base extends Type {

	/**
	 * @var string
	 */
	protected $title;

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
	protected $eprice;

	/**
	 * @var float
	 */
	protected $price;

	/**
	 * @var float
	 */
	protected $tax;

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
	 * @var bool
	 */
	protected $useDefaultTax = true;

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
	 * returns Custom1
	 *
	 * @return string
	 */
	public function getCustom1()
	{
		return $this->custom1;
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
	 * returns Custom2
	 *
	 * @return string
	 */
	public function getCustom2()
	{
		return $this->custom2;
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
	 * returns Custom3
	 *
	 * @return string
	 */
	public function getCustom3()
	{
		return $this->custom3;
	}

	/**
	 * sets PurchasePrice
	 *
	 * @param float $eprice
	 * @return $this
	 */
	public function setPurchasePrice($eprice)
	{
		$this->eprice = $eprice;
		return $this;
	}

	/**
	 * returns Eprice
	 *
	 * @return float
	 */
	public function getPurchasePrice()
	{
		return $this->eprice;
	}

	/**
	 * sets pos_txt
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
	 * returns PosTxt
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
	public function setRetailPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * returns Price
	 *
	 * @return float
	 */
	public function getRetailPrice()
	{
		return $this->price;
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
	 * sets title
	 *
	 * @param string $title
	 * @return $this
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * returns Title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
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
	 * @param boolean $useDefaultTax
	 * @return $this
	 */
	public function setUseDefaultTax($useDefaultTax)
	{
		$this->useDefaultTax = $useDefaultTax;
		return $this;
	}

	/**
	 * returns UseDefaultTax
	 *
	 * @return boolean
	 */
	public function getUseDefaultTax()
	{
		return $this->useDefaultTax;
	}


} 