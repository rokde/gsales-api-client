<?php namespace Rokde\Gsales\Api\Types;

/**
 * Class Status
 *
 * @package Rokde\Gsales\Api\Types
 */
class Status extends Type
{
	/**
	 * @var int
	 */
	private $code = 0;

	/**
	 * @var string
	 */
	private $message = '';

	/**
	 * @return bool
	 */
	public function isSuccessful()
	{
		return $this->code == 0;
	}

	/**
	 * @return int
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * returns a message by status code
	 *
	 * @param int $code
	 *
	 * @return string
	 */
	static public function getStatusMessage($code)
	{
		$messages = array(
			1 => 'API is deactivated',
			2 => 'API-Key is incorrect',
			3 => 'Using an unknown field name in the filter',
			4 => 'Using an unknown operator in the filter',
			5 => 'Using an unknown sort direction in the sort',
			6 => 'Record count hast to be greater than 0',
			7 => 'Record offset hast to be greater than 0',
			8 => 'No collection given as necessary',
			9 => 'Customer not found by id',
			10 => 'Article not found by id',
			11 => 'Queue not found by id',
			12 => 'Month value has to be between 1 and 12',
			13 => 'The date is incorrect, wrong year given',
			14 => 'User not found by id',
			15 => 'Role not found by id',
			16 => 'User not found by username',
			17 => 'User can not be used',
			18 => 'Document not found by id',
			19 => 'Document has not the state open as expected',
			20 => 'Position found by id does not belongs to the document assigned',
			21 => 'Mailspool entry not found by id',
			22 => 'Newsletter not found by id',
			23 => 'Newsletter recipient not found by id',
			24 => 'Document not found by id',
			25 => 'Sub not found by name',
		);

		return (isset($messages[$code])) ? $messages[$code] : '';
	}
}