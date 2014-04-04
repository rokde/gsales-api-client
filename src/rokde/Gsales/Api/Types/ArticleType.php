<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 11:27
 */

namespace Rokde\Gsales\Api\Types;


use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Article\Base;

class ArticleType extends Base implements IdentifierInterface {

	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $created;

	/**
	 * returns created
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
	 * returns Id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
}