<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 11:07
 */

namespace Rokde\Gsales\Api\Types\Newsletter;


use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;

class Recipient extends BaseRecipient implements IdentifierInterface {

	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var int
	 */
	protected $source;

	/**
	 * @var int
	 */
	protected $customers_id;

	/**
	 * @var int
	 */
	protected $spool_id;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $rcreated;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $rspooled;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $rsent;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $rtracked;

	/**
	 * returns Customer Id
	 *
	 * @return int
	 */
	public function getCustomerId()
	{
		return $this->customers_id;
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
	 * returns Rcreated
	 *
	 * @param bool $formatted
	 * @return string|DateTime
	 */
	public function createdAt($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->rcreated);

		return $this->rcreated;
	}

	/**
	 * returns Rsent
	 *
	 * @param bool $formatted
	 * @return string|DateTime
	 */
	public function sentAt($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->rsent);

		return $this->rsent;
	}

	/**
	 * returns Rspooled
	 *
	 * @param bool $formatted
	 * @return string|DateTime
	 */
	public function spooledAt($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->rspooled);

		return $this->rspooled;
	}

	/**
	 * returns Rtracked
	 *
	 * @param bool $formatted
	 * @return string|DateTime
	 */
	public function trackedAt($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->rtracked);

		return $this->rtracked;
	}

	/**
	 * returns Source
	 *
	 * @return int
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * returns SpoolId
	 *
	 * @return int
	 */
	public function getSpoolId()
	{
		return $this->spool_id;
	}
}