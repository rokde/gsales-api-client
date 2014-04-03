<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 15:45
 */

namespace Rokde\Gsales\Api\Types;


use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Queue\Base;

class QueueType extends Base implements IdentifierInterface {

	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $created;

	/**
	 * @var float
	 */
	protected $info_price_total;

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
	 * @return string|DateTime
	 */
	public function getCreated($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->created);

		return $this->created;
	}

	/**
	 * returns InfoPriceTotal
	 *
	 * @return float
	 */
	public function getInfoPriceTotal()
	{
		return $this->info_price_total;
	}
}