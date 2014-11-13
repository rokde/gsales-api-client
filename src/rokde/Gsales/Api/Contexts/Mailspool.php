<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\MailspoolType;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class Mailspool
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Mailspool extends Api {

	/**
	 * sends the whole mailspool
	 *
	 * @return int
	 */
	public function send()
	{
		return $this->call('sendMailspool');
	}

	/**
	 * fetches a mailspool entry by id
	 *
	 * @param int $mailSpoolId
	 * @return \Rokde\Gsales\Api\Types\MailspoolType
	 */
	public function get($mailSpoolId)
	{
		return $this->getEntity('getMailspoolEntry', 'mailspoolid', $mailSpoolId);
	}

	/**
	 * returns a list of mailspool entries, filtered, sorted, paginated
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 * @return \Rokde\Gsales\Api\Types\MailspoolType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getMailspoolEntries', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns the number of mailspool entries fetched by given filter
	 *
	 * @param Filter[] $filter
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getMailspoolEntriesCount', $filter);
	}

	/**
	 * duplicates a mailspool entry
	 *
	 * @param int|MailspoolType $mailspool
	 * @return MailspoolType
	 */
	public function duplicate($mailspool)
	{
		$mailSpoolId = Type::getId($mailspool);

		return $this->call('duplicateMailspoolEntry', ['mailspoolid' => $mailSpoolId]);
	}

	/**
	 * approve mailspool entry to be sendable
	 *
	 * @param int|MailspoolType $mailspool
	 * @return MailspoolType
	 */
	public function approve($mailspool)
	{
		return $this->modifyState('setMailspoolSendApprovalForEntry', 'mailspoolid', $mailspool);
	}

	/**
	 * removes approved mailspool entry to be sendable
	 *
	 * @param int|MailspoolType $mailspool
	 * @return MailspoolType
	 */
	public function removeApproval($mailspool)
	{
		return $this->modifyState('removeMailspoolSendApprovalForEntry', 'mailspoolid', $mailspool);
	}

	/**
	 * creates a mailspool entry
	 *
	 * @param MailspoolType $mailspool
	 * @return MailspoolType
	 */
	public function create(MailspoolType $mailspool)
	{
		return $this->call('createMailspoolEntry', ['data' => $mailspool]);
	}

	/**
	 * updates a mailspool entry
	 *
	 * @param MailspoolType $mailspool
	 * @return MailspoolType
	 */
	public function update(MailspoolType $mailspool)
	{
		$mailSpoolId = $mailspool->getId();

		return $this->call('updateMailspoolEntry', ['mailspoolid' => $mailSpoolId, 'data' => $mailspool]);
	}

	/**
	 * deletes a mailspool entry
	 *
	 * @param int|MailspoolType $mailspool
	 * @return bool
	 */
	public function delete($mailspool)
	{
		$mailSpoolId = Type::getId($mailspool);

		return $this->call('updateMailspoolEntry', ['mailspoolid' => $mailSpoolId]);
	}

	/**
	 * set mailspool entry as read by recipient
	 *
	 * @param int|MailspoolType $mailspool
	 * @return MailspoolType
	 */
	public function readByRecipient($mailspool)
	{
		$mailSpoolId = Type::getId($mailspool);

		return $this->call('setMailspoolReadForEntry', ['mailspoolid' => $mailSpoolId]);
	}
}