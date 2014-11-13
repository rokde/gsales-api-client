<?php namespace Rokde\Gsales\Api\Types\Contract;

use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Contracts\SeriesArt;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class BaseFilterable
 *
 * @package Rokde\Gsales\Api\Types\Contract
 */
class BaseFilterable extends Type implements IdentifierInterface
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $created;

	/**
	 * @var string date(Y-m-d)
	 */
	protected $start;

	/**
	 * @var string date(Y-m-d)
	 */
	protected $stop;

	/**
	 * @var int
	 */
	protected $series_art;

	/**
	 * @var int
	 */
	protected $interval;

	/**
	 * @var string date(Y-m-d)
	 */
	protected $duedate;

	/**
	 * @var string date(Y-m-d)
	 */
	protected $billed_until;

	/**
	 * @var int
	 */
	protected $user_id;

	/**
	 * @var string
	 */
	protected $invoiceno;

	/**
	 * @var int
	 */
	protected $poscount;

	/**
	 * @var float
	 */
	protected $amount;

	/**
	 * @var float
	 */
	protected $netamount;

	/**
	 * @var int
	 */
	protected $customers_id;

	/**
	 * @var int
	 */
	protected $print_contactperson;

	/**
	 * @var int
	 */
	protected $active;

	/**
	 * @var string
	 */
	protected $i_pre_txt;

	/**
	 * @var string
	 */
	protected $i_post_txt;

	/**
	 * @var int
	 */
	protected $curr_id = 0;

	/**
	 * @var string
	 */
	protected $curr_symbol;

	/**
	 * @var float
	 */
	protected $curr_rate;

	/**
	 * @var string
	 */
	protected $template;

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
	 * sets id
	 *
	 * @param int $id
	 *
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
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
	 * returns Created
	 *
	 * @param bool $formatted
	 *
	 * @return string|DateTime
	 */
	public function getCreated($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->created);

		return $this->created;
	}

	/**
	 * sets user id
	 *
	 * @param int $user_id
	 *
	 * @return $this
	 */
	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
		return $this;
	}

	/**
	 * returns UserId
	 *
	 * @return int
	 */
	public function getUserId()
	{
		return $this->user_id;
	}


	/**
	 * sets InvoiceNumber
	 *
	 * @param string $invoiceno
	 *
	 * @return $this
	 */
	public function setInvoiceNumber($invoiceno)
	{
		$this->invoiceno = $invoiceno;
		return $this;
	}

	/**
	 * returns InvoiceNumber
	 *
	 * @return string
	 */
	public function getInvoiceNumber()
	{
		return $this->invoiceno;
	}

	/**
	 * sets pos count
	 *
	 * @param int $poscount
	 *
	 * @return $this
	 */
	public function setPositionCount($poscount)
	{
		$this->poscount = $poscount;
		return $this;
	}

	/**
	 * returns Pos count
	 *
	 * @return int
	 */
	public function getPositionCount()
	{
		return $this->poscount;
	}

	/**
	 * sets amount
	 *
	 * @param float $amount
	 *
	 * @return $this
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
		return $this;
	}

	/**
	 * returns Amount
	 *
	 * @return float
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * sets net amount
	 *
	 * @param float $netamount
	 *
	 * @return $this
	 */
	public function setNetAmount($netamount)
	{
		$this->netamount = $netamount;
		return $this;
	}

	/**
	 * returns Net amount
	 *
	 * @return float
	 */
	public function getNetAmount()
	{
		return $this->netamount;
	}

	/**
	 * sets customer id
	 *
	 * @param int $customers_id
	 *
	 * @return $this
	 */
	public function setCustomerId($customers_id)
	{
		$this->customers_id = $customers_id;
		return $this;
	}

	/**
	 * returns CustomersId
	 *
	 * @return int
	 */
	public function getCustomerId()
	{
		return $this->customers_id;
	}

	/**
	 * sets print contact person
	 *
	 * @param int $print_contactperson
	 *
	 * @return $this
	 */
	public function setPrintContactPerson($print_contactperson)
	{
		$this->print_contactperson = ($print_contactperson) ? 1 : 0;
		return $this;
	}

	/**
	 * returns Print Contactperson
	 *
	 * @return bool
	 */
	public function canPrintContactPerson()
	{
		return ($this->print_contactperson == 1);
	}

	/**
	 * sets curr_id
	 *
	 * @param int $curr_id
	 *
	 * @return $this
	 */
	public function setCurrencyId($curr_id)
	{
		$this->curr_id = $curr_id;
		return $this;
	}

	/**
	 * returns CurrencyId
	 *
	 * @return int
	 */
	public function getCurrencyId()
	{
		return $this->curr_id;
	}

	/**
	 * sets currency rate
	 *
	 * @param float $curr_rate
	 *
	 * @return $this
	 */
	public function setCurrencyRate($curr_rate)
	{
		$this->curr_rate = $curr_rate;
		return $this;
	}

	/**
	 * returns Currency Rate
	 *
	 * @return float
	 */
	public function getCurrencyRate()
	{
		return $this->curr_rate;
	}

	/**
	 * sets currency symbol
	 *
	 * @param string $curr_symbol
	 *
	 * @return $this
	 */
	public function setCurrencySymbol($curr_symbol)
	{
		$this->curr_symbol = $curr_symbol;
		return $this;
	}

	/**
	 * returns CurrencySymbol
	 *
	 * @return string
	 */
	public function getCurrencySymbol()
	{
		return $this->curr_symbol;
	}

	/**
	 * sets ClosingText
	 *
	 * @param string $i_post_txt
	 *
	 * @return $this
	 */
	public function setClosingText($i_post_txt)
	{
		$this->i_post_txt = $i_post_txt;
		return $this;
	}

	/**
	 * returns ClosingText
	 *
	 * @return string
	 */
	public function getClosingText()
	{
		return $this->i_post_txt;
	}

	/**
	 * sets IntroductionText
	 *
	 * @param string $i_pre_txt
	 *
	 * @return $this
	 */
	public function setIntroductionText($i_pre_txt)
	{
		$this->i_pre_txt = $i_pre_txt;
		return $this;
	}

	/**
	 * returns IntroductionText
	 *
	 * @return string
	 */
	public function getIntroductionText()
	{
		return $this->i_pre_txt;
	}

	/**
	 * sets template
	 *
	 * @param string $template
	 *
	 * @return $this
	 */
	public function setTemplate($template)
	{
		$this->template = $template;
		return $this;
	}

	/**
	 * returns Template
	 *
	 * @return string
	 */
	public function getTemplate()
	{
		return $this->template;
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
	 *
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
	 *
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
	 *
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
	 *
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
	 *
	 * @return $this
	 */
	public function setCustom5($custom5)
	{
		$this->custom5 = $custom5;

		return $this;
	}

	/**
	 * sets active
	 *
	 * @param bool $flag
	 *
	 * @return $this
	 */
	public function setActive($flag = true)
	{
		$this->active = $flag ? 1 : 0;
		return $this;
	}

	/**
	 * returns Active
	 *
	 * @return bool
	 */
	public function isActive()
	{
		return ($this->active == 1);
	}

	/**
	 * sets billed_until
	 *
	 * @param string $billed_until
	 *
	 * @return $this
	 */
	public function setBilledUntil($billed_until)
	{
		$this->billed_until = $billed_until;
		return $this;
	}

	/**
	 * returns BilledUntil
	 *
	 * @param bool $formatted
	 *
	 * @return string
	 */
	public function getBilledUntil($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->billed_until)->setTime(0, 0, 0);

		return $this->billed_until;
	}

	/**
	 * sets duedate
	 *
	 * @param string $duedate
	 *
	 * @return $this
	 */
	public function setDuedate($duedate)
	{
		$this->duedate = $duedate;
		return $this;
	}

	/**
	 * returns Duedate
	 *
	 * @param bool $formatted
	 *
	 * @return string
	 */
	public function getDuedate($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->duedate)->setTime(0, 0, 0);
		return $this->duedate;
	}

	/**
	 * sets interval
	 *
	 * @param int $interval
	 *
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
	 * sets stop
	 *
	 * @param string $stop
	 *
	 * @return $this
	 */
	public function setStop($stop)
	{
		$this->stop = $stop;
		return $this;
	}

	/**
	 * returns Stop
	 *
	 * @param bool $formatted
	 *
	 * @return string|DateTime
	 */
	public function getStop($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->stop)->setTime(0, 0, 0);

		return $this->stop;
	}
}