<?php namespace Rokde\Gsales\Api\Types\Invoice;

use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class DunningAction
 *
 * @package Rokde\Gsales\Api\Types\Invoice
 */
class DunningAction extends Type implements IdentifierInterface
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var int
	 */
	protected $invoices_id;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $created;

	/**
	 * @var int
	 */
	protected $action;

	/**
	 * @var float
	 */
	protected $fee;

	/**
	 * returns Action
	 *
	 * @return int
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * returns Created
	 *
	 * @param bool $formatted
	 *
	 * @return string|\DateTime
	 */
	public function getCreated($formatted = true)
	{
		if ($formatted)
			return \DateTime::createFromFormat('Y-m-d H:i:s', $this->created);

		return $this->created;
	}

	/**
	 * returns Fee
	 *
	 * @return float
	 */
	public function getFee()
	{
		return $this->fee;
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
}