<?php namespace Rokde\Gsales\Api\Types;

use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;

/**
 * Class CustomerType
 *
 * @package Rokde\Gsales\Api\Types
 */
class CustomerType extends Type implements IdentifierInterface
{
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $customerno;

	/**
	 * @var string
	 */
	private $created;

	/**
	 * @var string
	 */
	private $company;

	/**
	 * @var string
	 */
	private $companylabel;
	/**
	 * @var string
	 */
	private $title;
	/**
	 * @var string
	 */
	private $firstname;
	/**
	 * @var string
	 */
	private $lastname;
	/**
	 * @var int
	 */
	private $print_contactperson;
	/**
	 * @var string
	 */
	private $address;
	/**
	 * @var string
	 */
	private $zip;
	/**
	 * @var string
	 */
	private $city;
	/**
	 * @var string
	 */
	private $country;
	/**
	 * @var string
	 */
	private $taxnumber;
	/**
	 * @var int
	 */
	private $salestaxfree;
	/**
	 * @var string
	 */
	private $phone;
	/**
	 * @var string
	 */
	private $cellular;
	/**
	 * @var string
	 */
	private $fax;
	/**
	 * @var string
	 */
	private $email;
	/**
	 * @var string
	 */
	private $homepage;
	/**
	 * @var string
	 */
	private $bank_account_no;
	/**
	 * @var string
	 */
	private $bank_code;
	/**
	 * @var string
	 */
	private $bank_name;
	/**
	 * @var string
	 */
	private $bank_account_owner;
	/**
	 * @var string
	 */
	private $bank_iban;
	/**
	 * @var string
	 */
	private $bank_bic;

	/**
	 * @var string date(Y-m-d)
	 */
	private $sepa_deb_sig_date;
	/**
	 * @var string
	 */
	private $sepa_ref;

	/**
	 * @var int
	 */
	private $mail_invoices;
	/**
	 * @var int
	 */
	private $mail_paymreminders;
	/**
	 * @var string
	 */
	private $custom1;
	/**
	 * @var string
	 */
	private $custom2;
	/**
	 * @var string
	 */
	private $custom3;
	/**
	 * @var string
	 */
	private $custom4;
	/**
	 * @var string
	 */
	private $custom5;
	/**
	 * @var bool
	 */
	private $dtaus;
	/**
	 * @var int
	 */
	private $typ;
	/**
	 * @var string
	 */
	private $frontend_passwordlost;
	/**
	 * @var string
	 */
	private $proposed_changes;

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
	 * sets direct debit
	 *
	 * @param bool $flag
	 *
	 * @return $this
	 * @internal param bool $dtaus
	 */
	public function setDirectDebit($flag)
	{
		$this->dtaus = $flag;

		return $this;
	}

	/**
	 * set invoices to be spooled
	 *
	 * @param bool $flag
	 *
	 * @internal param bool $mail_invoices
	 * @return $this
	 */
	public function setInvoicesBeSpooled($flag = true)
	{
		$this->mail_invoices = $flag ? 1 : 0;

		return $this;
	}

	/**
	 * set payment reminders to be spooled
	 *
	 * @param bool $flag
	 *
	 * @internal param bool $mail_paymreminders
	 * @return $this
	 */
	public function setPaymentRemindersBeSpooled($flag = true)
	{
		$this->mail_paymreminders = $flag ? 1 : 0;

		return $this;
	}

	/**
	 * sets print contact person on documents
	 *
	 * @param bool $flag
	 *
	 * @return $this
	 * @internal param int $print_contactperson
	 */
	public function setPrintContactPerson($flag = true)
	{
		$this->print_contactperson = $flag ? 1 : 0;

		return $this;
	}

	/**
	 * sets sales tax free
	 *
	 * @param bool $flag
	 *
	 * @return $this
	 * @internal param int $salestaxfree
	 */
	public function setSalesTaxFree($flag = true)
	{
		$this->salestaxfree = $flag ? 1 : 0;

		return $this;
	}

	/**
	 * sets the sepa deb signature date
	 *
	 * @param null $date
	 *
	 * @internal param string $sepa_deb_sig_date date(Y-m-d)
	 * @return $this
	 */
	public function setSepaDebSignatureDate($date = null)
	{
		if ($date === null) {
			$date = date('Y-m-d');
		}

		$this->sepa_deb_sig_date = $date;

		return $this;
	}

	/**
	 * customer is a private person
	 *
	 * @return $this
	 */
	public function setIsPrivate()
	{
		$this->typ = 1;

		return $this;
	}

	/**
	 * customer is a company
	 *
	 * @return $this
	 */
	public function setIsCompany()
	{
		$this->typ = 0;

		return $this;
	}

	/**
	 * returns address
	 *
	 * @return string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * sets address
	 *
	 * @param string $address
	 *
	 * @return $this
	 */
	public function setAddress($address)
	{
		$this->address = $address;

		return $this;
	}

	/**
	 * returns bank account number
	 *
	 * @return string
	 */
	public function getBankAccountNumber()
	{
		return $this->bank_account_no;
	}

	/**
	 * sets bank account number
	 *
	 * @param string $bank_account_no
	 *
	 * @return $this
	 */
	public function setBankAccountNumber($bank_account_no)
	{
		$this->bank_account_no = $bank_account_no;

		return $this;
	}

	/**
	 * returns bank account owner
	 *
	 * @return string
	 */
	public function getBankAccountOwner()
	{
		return $this->bank_account_owner;
	}

	/**
	 * sets bank account owner
	 *
	 * @param string $bank_account_owner
	 *
	 * @return $this
	 */
	public function setBankAccountOwner($bank_account_owner)
	{
		$this->bank_account_owner = $bank_account_owner;

		return $this;
	}

	/**
	 * returns bank identification code
	 *
	 * @return string
	 */
	public function getBankBic()
	{
		return $this->bank_bic;
	}

	/**
	 * returns bank identification code
	 *
	 * @param string $bank_bic
	 *
	 * @return $this
	 */
	public function setBankBic($bank_bic)
	{
		$this->bank_bic = $bank_bic;

		return $this;
	}

	/**
	 * returns bank code
	 *
	 * @return string
	 */
	public function getBankCode()
	{
		return $this->bank_code;
	}

	/**
	 * sets bank code
	 *
	 * @param string $bank_code
	 *
	 * @return $this
	 */
	public function setBankCode($bank_code)
	{
		$this->bank_code = $bank_code;

		return $this;
	}

	/**
	 * returns bank iban
	 *
	 * @return string
	 */
	public function getBankIban()
	{
		return $this->bank_iban;
	}

	/**
	 * sets bank iban
	 *
	 * @param string $bank_iban
	 *
	 * @return $this
	 */
	public function setBankIban($bank_iban)
	{
		$this->bank_iban = $bank_iban;

		return $this;
	}

	/**
	 * returns bank institute name
	 *
	 * @return string
	 */
	public function getBankName()
	{
		return $this->bank_name;
	}

	/**
	 * sets bank institute name
	 *
	 * @param string $bank_name
	 *
	 * @return $this
	 */
	public function setBankName($bank_name)
	{
		$this->bank_name = $bank_name;

		return $this;
	}

	/**
	 * get mobile number
	 *
	 * @return string
	 */
	public function getCellular()
	{
		return $this->cellular;
	}

	/**
	 * sets mobile number
	 *
	 * @param string $cellular
	 *
	 * @return $this
	 */
	public function setCellular($cellular)
	{
		$this->cellular = $cellular;

		return $this;
	}

	/**
	 * returns city
	 *
	 * @return string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * sets city
	 *
	 * @param string $city
	 *
	 * @return $this
	 */
	public function setCity($city)
	{
		$this->city = $city;

		return $this;
	}

	/**
	 * returns company name
	 *
	 * @return string
	 */
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * sets company name
	 *
	 * @param string $company
	 *
	 * @return $this
	 */
	public function setCompany($company)
	{
		$this->company = $company;

		return $this;
	}

	/**
	 * returns company label
	 *
	 * @return string
	 */
	public function getCompanyLabel()
	{
		return $this->companylabel;
	}

	/**
	 * returns country
	 *
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * sets country
	 *
	 * @param string $country
	 *
	 * @return $this
	 */
	public function setCountry($country)
	{
		$this->country = $country;

		return $this;
	}

	/**
	 * returns created at
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
	 * returns customer number
	 *
	 * @return string
	 */
	public function getCustomerNumber()
	{
		return $this->customerno;
	}

	/**
	 * has direct debit
	 *
	 * @return boolean
	 */
	public function hasDirectDebit()
	{
		return $this->dtaus;
	}

	/**
	 * returns email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * sets email
	 *
	 * @param string $email
	 *
	 * @return $this
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * returns fax
	 *
	 * @return string
	 */
	public function getFax()
	{
		return $this->fax;
	}

	/**
	 * sets fax
	 *
	 * @param string $fax
	 *
	 * @return $this
	 */
	public function setFax($fax)
	{
		$this->fax = $fax;

		return $this;
	}

	/**
	 * returns first name
	 * @return string
	 */
	public function getFirstname()
	{
		return $this->firstname;
	}

	/**
	 * sets first name
	 *
	 * @param string $firstname
	 *
	 * @return $this
	 */
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;

		return $this;
	}

	/**
	 * returns the frontend password lost token
	 *
	 * @return string
	 */
	public function getFrontendPasswordlost()
	{
		return $this->frontend_passwordlost;
	}

	/**
	 * returns homepage
	 *
	 * @return string
	 */
	public function getHomepage()
	{
		return $this->homepage;
	}

	/**
	 * sets homepage
	 *
	 * @param string $homepage
	 *
	 * @return $this
	 */
	public function setHomepage($homepage)
	{
		$this->homepage = $homepage;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getLastname()
	{
		return $this->lastname;
	}

	/**
	 * @param string $lastname
	 */
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;

        return $this;
	}

	/**
	 * @return bool
	 */
	public function canInvoicesBeSpooled()
	{
		return ($this->mail_invoices == 1);
	}

	/**
	 * @return bool
	 */
	public function canPaymentRemindersBeSpooled()
	{
		return ($this->mail_paymreminders == 1);
	}

	/**
	 * @return string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;

        return $this;
	}

	/**
	 * @return bool
	 */
	public function canPrintContactPerson()
	{
		return ($this->print_contactperson == 1);
	}

	/**
	 * @return null|array
	 */
	public function getProposedChanges()
	{
		if ($this->proposed_changes === '')
			return null;

		return unserialize(base64_decode($this->proposed_changes));
	}

	/**
	 * @param string $proposed_changes
	 */
	public function setProposedChanges($proposed_changes)
	{
		$this->proposed_changes = $proposed_changes;

        return $this;
	}

	/**
	 * @return bool
	 */
	public function isSalesTaxFree()
	{
		return ($this->salestaxfree == 1);
	}

	/**
	 * @param bool $formatted
	 *
	 * @return string|DateTime
	 */
	public function getSepaDebSignatureDate($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d', $this->sepa_deb_sig_date)->setTime(0, 0, 0);
		return $this->sepa_deb_sig_date;
	}

	/**
	 * @return string
	 */
	public function getSepaRef()
	{
		return $this->sepa_ref;
	}

	/**
	 * @param string $sepa_ref
	 */
	public function setSepaRef($sepa_ref)
	{
		$this->sepa_ref = $sepa_ref;

        return $this;
	}

	/**
	 * @return string
	 */
	public function getTaxnumber()
	{
		return $this->taxnumber;
	}

	/**
	 * @param string $taxnumber
	 */
	public function setTaxnumber($taxnumber)
	{
		$this->taxnumber = $taxnumber;

        return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;

        return $this;
	}

	/**
	 * @return bool
	 */
	public function isPrivate()
	{
		return ($this->typ == 1);
	}

	/**
	 * @return bool
	 */
	public function isCompany()
	{
		return ($this->typ == 0);
	}

	/**
	 * @return string
	 */
	public function getZip()
	{
		return $this->zip;
	}

	/**
	 * @param string $zip
	 */
	public function setZip($zip)
	{
		$this->zip = $zip;

        return $this;
	}

	/**
	 * returns any of customer number or email set
	 *
	 * @return string
	 */
	public function getCustomerNumberOrEmail()
	{
		$customerNo = $this->getCustomerNumber();
		return ( ! empty($customerNo)) ? $customerNo : $this->getEmail();
	}
}