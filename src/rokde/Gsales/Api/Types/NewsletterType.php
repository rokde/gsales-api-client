<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 04.04.14
 * Time: 10:59
 */

namespace Rokde\Gsales\Api\Types;


use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Types\Newsletter\Base;

class NewsletterType extends Base implements IdentifierInterface {

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
	protected $info_attachements = 0;

	/**
	 * @var int
	 */
	protected $info_recipients = 0;

	/**
	 * @var Attachment[]
	 */
	protected $attachements;

	/**
	 * returns Attachments
	 *
	 * @return \Rokde\Gsales\Api\Types\Attachment[]
	 */
	public function getAttachments()
	{
		return $this->attachements;
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
	 * returns Id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * returns InfoAttachments
	 *
	 * @return int
	 */
	public function getInfoAttachments()
	{
		return $this->info_attachements;
	}

	/**
	 * returns InfoRecipients
	 *
	 * @return int
	 */
	public function getInfoRecipients()
	{
		return $this->info_recipients;
	}
} 