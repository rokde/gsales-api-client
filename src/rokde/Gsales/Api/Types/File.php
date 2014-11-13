<?php namespace Rokde\Gsales\Api\Types;

/**
 * Class File
 *
 * @package Rokde\Gsales\Api\Types
 */
class File
{
	/**
	 * name of the file
	 *
	 * @var string
	 */
	private $name;

	/**
	 * size in bytes
	 *
	 * @var int
	 */
	private $size;

	/**
	 * file content
	 *
	 * @var string
	 */
	private $content;

	/**
	 * returns Content
	 *
	 * @return string
	 */
	public function getContent()
	{
		return base64_decode($this->content);
	}

	/**
	 * returns base64 encoded content
	 *
	 * @return string
	 */
	public function getContentRaw()
	{
		return $this->content;
	}

	/**
	 * returns Name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * returns Size
	 *
	 * @return int
	 */
	public function getSize()
	{
		return $this->size;
	}
}