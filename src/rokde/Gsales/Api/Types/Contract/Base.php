<?php namespace Rokde\Gsales\Api\Types\Contract;

/**
 * Class Base
 *
 * @package Rokde\Gsales\Api\Types\Contract
 */
class Base extends BaseFilterable
{
	/**
	 * @var float
	 */
	protected $rounded_amount;

	/**
	 * @var string
	 */
	protected $recipient_txt;

	/**
	 * @var string
	 */
	protected $vars_i_pre_txt;

	/**
	 * @var string
	 */
	protected $vars_i_post_txt;

	/**
	 * @var float
	 */
	protected $rounded_curr_amount;

	/**
	 * returns RecipientText
	 *
	 * @return string
	 */
	public function getRecipientText()
	{
		return $this->recipient_txt;
	}

	/**
	 * returns RoundedAmount
	 *
	 * @return float
	 */
	public function getRoundedAmount()
	{
		return $this->rounded_amount;
	}

	/**
	 * returns RoundedCurrencyAmount
	 *
	 * @return float
	 */
	public function getRoundedCurrencyAmount()
	{
		return $this->rounded_curr_amount;
	}

	/**
	 * returns ClosingTextAssembled
	 *
	 * @return string
	 */
	public function getClosingTextAssembled()
	{
		return $this->vars_i_post_txt;
	}

	/**
	 * returns IntroductionTextAssembled
	 *
	 * @return string
	 */
	public function getIntroductionTextAssembled()
	{
		return $this->vars_i_pre_txt;
	}
}