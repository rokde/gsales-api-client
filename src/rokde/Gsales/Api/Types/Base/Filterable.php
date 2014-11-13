<?php namespace Rokde\Gsales\Api\Types\Base;

use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Contracts\OfferStatus;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class Filterable
 *
 * @package Rokde\Gsales\Api\Types\Base
 */
class Filterable extends Type implements IdentifierInterface
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
	 * @var string
	 */
	protected $customerno;

	/**
	 * @var string
	 */
	protected $customer_company;

	/**
	 * @var string
	 */
	protected $customer_title;

	/**
	 * @var string
	 */
	protected $customer_lastname;

	/**
	 * @var string
	 */
	protected $customer_firstname;

	/**
	 * @var string
	 */
	protected $customer_address;

	/**
	 * @var string
	 */
	protected $customer_zip;

	/**
	 * @var string
	 */
	protected $customer_city;

	/**
	 * @var string
	 */
	protected $customer_country;

	/**
	 * @var int
	 */
	protected $print_contactperson;

	/**
	 * @var int
	 */
	protected $status_id = OfferStatus::OPEN;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $status_date;

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
	 * sets customer address
	 *
	 * @param string $customer_address
	 *
	 * @return $this
	 */
	public function setCustomerAddress($customer_address)
	{
		$this->customer_address = $customer_address;
		return $this;
	}

	/**
	 * returns CustomerAddress
	 *
	 * @return string
	 */
	public function getCustomerAddress()
	{
		return $this->customer_address;
	}

	/**
	 * sets customer city
	 *
	 * @param string $customer_city
	 *
	 * @return $this
	 */
	public function setCustomerCity($customer_city)
	{
		$this->customer_city = $customer_city;
		return $this;
	}

	/**
	 * returns CustomerCity
	 *
	 * @return string
	 */
	public function getCustomerCity()
	{
		return $this->customer_city;
	}

	/**
	 * sets customer company
	 *
	 * @param string $customer_company
	 *
	 * @return $this
	 */
	public function setCustomerCompany($customer_company)
	{
		$this->customer_company = $customer_company;
		return $this;
	}

	/**
	 * returns CustomerCompany
	 *
	 * @return string
	 */
	public function getCustomerCompany()
	{
		return $this->customer_company;
	}

	/**
	 * sets customer country
	 *
	 * @param string $customer_country
	 *
	 * @return $this
	 */
	public function setCustomerCountry($customer_country)
	{
		$this->customer_country = $customer_country;
		return $this;
	}

	/**
	 * returns CustomerCountry
	 *
	 * @return string
	 */
	public function getCustomerCountry()
	{
		return $this->customer_country;
	}

	/**
	 * sets customer firstname
	 *
	 * @param string $customer_firstname
	 *
	 * @return $this
	 */
	public function setCustomerFirstname($customer_firstname)
	{
		$this->customer_firstname = $customer_firstname;
		return $this;
	}

	/**
	 * returns CustomerFirstname
	 *
	 * @return string
	 */
	public function getCustomerFirstname()
	{
		return $this->customer_firstname;
	}

	/**
	 * sets customer lastname
	 *
	 * @param string $customer_lastname
	 *
	 * @return $this
	 */
	public function setCustomerLastname($customer_lastname)
	{
		$this->customer_lastname = $customer_lastname;
		return $this;
	}

	/**
	 * returns CustomerLastname
	 *
	 * @return string
	 */
	public function getCustomerLastname()
	{
		return $this->customer_lastname;
	}

	/**
	 * sets customer title
	 *
	 * @param string $customer_title
	 *
	 * @return $this
	 */
	public function setCustomerTitle($customer_title)
	{
		$this->customer_title = $customer_title;
		return $this;
	}

	/**
	 * returns CustomerTitle
	 *
	 * @return string
	 */
	public function getCustomerTitle()
	{
		return $this->customer_title;
	}

	/**
	 * sets customer zip
	 *
	 * @param string $customer_zip
	 *
	 * @return $this
	 */
	public function setCustomerZip($customer_zip)
	{
		$this->customer_zip = $customer_zip;
		return $this;
	}

	/**
	 * returns CustomerZip
	 *
	 * @return string
	 */
	public function getCustomerZip()
	{
		return $this->customer_zip;
	}

	/**
	 * sets customer number
	 *
	 * @param string $customerno
	 *
	 * @return $this
	 */
	public function setCustomerNumber($customerno)
	{
		$this->customerno = $customerno;
		return $this;
	}

	/**
	 * returns CustomerNumber
	 *
	 * @return string
	 */
	public function getCustomerNumber()
	{
		return $this->customerno;
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
	 * sets status_date
	 *
	 * @param string $status_date
	 *
	 * @return $this
	 */
	public function setStatusDate($status_date)
	{
		$this->status_date = $status_date;
		return $this;
	}

	/**
	 * returns StatusDate
	 *
	 * @param bool $formatted
	 *
	 * @return string|DateTime
	 */
	public function getStatusDate($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->status_date);

		return $this->status_date;
	}

	/**
	 * sets status_id
	 *
	 * @param \Rokde\Gsales\Api\Contracts\OfferStatus $status
	 *
	 * @internal param int $status_id
	 * @return $this
	 */
	public function setStatus(OfferStatus $status)
	{
		$this->status_id = $status;
		return $this;
	}

	/**
	 * returns Status
	 *
	 * @internal param int $status_id
	 * @return int
	 */
	public function getStatus()
	{
		return $this->status_id;
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
}