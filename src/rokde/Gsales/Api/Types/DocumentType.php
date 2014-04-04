<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 11:45
 */

namespace Rokde\Gsales\Api\Types;


use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;

class DocumentType extends Type implements IdentifierInterface {

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
	protected $customers_id;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $original_filename;

	/**
	 * @var bool
	 */
	protected $public = false;

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
	 * returns Customer Id
	 *
	 * @return int
	 */
	public function getCustomerId()
	{
		return $this->customers_id;
	}

	/**
	 * returns Description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
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
	 * returns OriginalFilename
	 *
	 * @return string
	 */
	public function getOriginalFilename()
	{
		return $this->original_filename;
	}

	/**
	 * returns Public
	 *
	 * @return boolean
	 */
	public function isPublic()
	{
		return $this->public;
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
}