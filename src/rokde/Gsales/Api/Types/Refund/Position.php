<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 12:20
 */

namespace Rokde\Gsales\Api\Types\Refund;


use Rokde\Gsales\Api\Contracts\IdentifierInterface;

class Position extends BasePosition implements IdentifierInterface {
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var int
	 */
	protected $invoices_id;

	/**
	 * @var int
	 */
	protected $article_id;

	/**
	 * @var string
	 */
	protected $vars_pos_txt;

	/**
	 * @var float
	 */
	protected $curr_price;

	/**
	 * @var float
	 */
	protected $tprice;

	/**
	 * @var float
	 */
	protected $rounded_tprice;

	/**
	 * @var float
	 */
	protected $rounded_curr_tprice;

	/**
	 * @var float
	 */
	protected $tax_value;

	/**
	 * @var float
	 */
	protected $discount_value;

	/**
	 * @var int
	 */
	protected $sortno;

	/**
	 * @var int
	 */
	protected $headline;

	/**
	 * returns ArticleId
	 *
	 * @return int
	 */
	public function getArticleId()
	{
		return $this->article_id;
	}

	/**
	 * returns CurrencyPrice (net)
	 *
	 * @return float
	 */
	public function getCurrencyPrice()
	{
		return $this->curr_price;
	}

	/**
	 * returns DiscountValue
	 *
	 * @return float
	 */
	public function getDiscountValue()
	{
		return $this->discount_value;
	}

	/**
	 * returns Headline
	 *
	 * @return int
	 */
	public function getHeadline()
	{
		return $this->headline;
	}

	/**
	 * returns Id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * returns Invoice Id
	 *
	 * @return int
	 */
	public function getInvoiceId()
	{
		return $this->invoices_id;
	}

	/**
	 * returns rounded total price in currency (net)
	 *
	 * @return float
	 */
	public function getRoundedCurrencyTotalPrice()
	{
		return $this->rounded_curr_tprice;
	}

	/**
	 * returns rounded total price (net)
	 *
	 * @return float
	 */
	public function getRoundedTotalPrice()
	{
		return $this->rounded_tprice;
	}

	/**
	 * returns sort number
	 *
	 * @return int
	 */
	public function getSortNumber()
	{
		return $this->sortno;
	}

	/**
	 * returns TaxValue
	 *
	 * @return float
	 */
	public function getTaxValue()
	{
		return $this->tax_value;
	}

	/**
	 * returns total price
	 *
	 * @return float
	 */
	public function getTotalPrice()
	{
		return $this->tprice;
	}

	/**
	 * returns assembled position text
	 *
	 * @return string
	 */
	public function getPositionTextAssembled()
	{
		return $this->vars_pos_txt;
	}
} 