<?php namespace Rokde\Gsales\Api\Types;

use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;

/**
 * Class Attachment
 *
 * @package Rokde\Gsales\Api\Types
 */
class Attachment extends Type implements IdentifierInterface
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $filename;

	/**
	 * @var int
	 */
	protected $filesize;

	/**
	 * @var string
	 */
	protected $mime;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $created;

	/**
	 * sets created
	 *
	 * @param string $created
	 *
	 * @return $this
	 */
	public function setCreated($created)
	{
		$this->created = $created;
		return $this;
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
	 * sets filename
	 *
	 * @param string $filename
	 *
	 * @return $this
	 */
	public function setFilename($filename)
	{
		$this->filename = $filename;
		return $this;
	}

	/**
	 * returns Filename
	 *
	 * @return string
	 */
	public function getFilename()
	{
		return $this->filename;
	}

	/**
	 * sets filesize
	 *
	 * @param int $filesize
	 *
	 * @return $this
	 */
	public function setFilesize($filesize)
	{
		$this->filesize = $filesize;
		return $this;
	}

	/**
	 * returns Filesize
	 *
	 * @return int
	 */
	public function getFilesize()
	{
		return $this->filesize;
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
	 * sets mime
	 *
	 * @param string $mime
	 *
	 * @return $this
	 */
	public function setMime($mime)
	{
		$this->mime = $mime;
		return $this;
	}

	/**
	 * returns Mime
	 *
	 * @return string
	 */
	public function getMime()
	{
		return $this->mime;
	}
}