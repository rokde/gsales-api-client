<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 15:21
 */

namespace Rokde\Gsales\Api\Contexts;


use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Newsletter\Base;
use Rokde\Gsales\Api\Types\Newsletter\BaseRecipient;
use Rokde\Gsales\Api\Types\Newsletter\Recipient;
use Rokde\Gsales\Api\Types\NewsletterType;
use Rokde\Gsales\Api\Types\Sort;

class Newsletter extends Api {

	/**
	 * fetches a newsletter by id
	 *
	 * @param int $newsletterId
	 * @return \Rokde\Gsales\Api\Types\NewsletterType
	 */
	public function get($newsletterId)
	{
		return $this->getEntity('getNewsletter', 'newsletterid', $newsletterId);
	}

	/**
	 * returns a collection of newsletters, filtered, sorted, paginated
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 * @return \Rokde\Gsales\Api\Types\NewsletterType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getNewsletters', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns the number of newsletters returned by filter
	 *
	 * @param Filter[] $filter
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getNewlettersCount', $filter);
	}

	/**
	 * returns all recipients from newsletter
	 *
	 * @param int|NewsletterType $newsletter
	 * @return \Rokde\Gsales\Api\Types\Newsletter\Recipient[]
	 */
	public function recipients($newsletter)
	{
		$newsletterId = ($newsletter instanceof NewsletterType) ? $newsletter->getId() : $newsletter;

		return $this->call('getNewsletterRecipients', ['newsletterid' => $newsletterId]);
	}

	/**
	 * creates a newsletter
	 *
	 * @param Base $newsletter
	 * @return NewsletterType
	 */
	public function create(Base $newsletter)
	{
		return $this->call('createNewsletter', ['data' => $newsletter]);
	}

	/**
	 * updates a newsletter
	 *
	 * @param NewsletterType $newsletter
	 * @return NewsletterType
	 */
	public function udpate(NewsletterType $newsletter)
	{
		$newsletterId = $newsletter->getId();

		return $this->call('updateNewsletter', ['newsletterid' => $newsletterId, 'data' => $newsletter]);
	}

	/**
	 * deletes a newsletter
	 *
	 * @param int|NewsletterType $newsletter
	 * @return bool
	 */
	public function delete($newsletter)
	{
		$newsletterId = ($newsletter instanceof NewsletterType) ? $newsletter->getId() : $newsletter;

		return $this->call('deleteNewsletter', ['newsletterid' => $newsletterId]);
	}

	/**
	 * adds a recipient to the newsletter
	 *
	 * @param int|NewsletterType $newsletter
	 * @param BaseRecipient $recipient
	 * @return int
	 */
	public function addRecipient($newsletter, BaseRecipient $recipient)
	{
		$newsletterId = ($newsletter instanceof NewsletterType) ? $newsletter->getId() : $newsletter;

		return $this->call('addNewsletterRecipient', ['newsletterid' => $newsletterId, 'data' => $recipient]);
	}

	/**
	 * adds a customer as recipient to the newsletter
	 *
	 * @param int|NewsletterType $newsletter
	 * @param int|CustomerType $customer
	 * @return int
	 */
	public function addCustomerAsRecipient($newsletter, $customer)
	{
		$newsletterId = ($newsletter instanceof NewsletterType) ? $newsletter->getId() : $newsletter;
		$customerId = ($customer instanceof NewsletterType) ? $customer->getId() : $customer;

		return $this->call('addNewsletterRecipientByCustomerId', ['newsletterid' => $newsletterId, 'customerid' => $customerId]);
	}

	/**
	 * removes a recipient from newsletter
	 *
	 * @param int|NewsletterType $newsletter
	 * @param int|Recipient $recipient
	 * @return int
	 */
	public function removeRecipient($newsletter, $recipient)
	{
		$newsletterId = ($newsletter instanceof NewsletterType) ? $newsletter->getId() : $newsletter;
		$recipientId = ($recipient instanceof NewsletterType) ? $recipient->getId() : $recipient;

		return $this->call('removeNewsletterRecipient', ['newsletterid' => $newsletterId, 'recipientid' => $recipientId]);
	}

	/**
	 * spools a newsletter
	 *
	 * @param int|NewsletterType $newsletter
	 * @return int
	 */
	public function spool($newsletter)
	{
		$newsletterId = ($newsletter instanceof NewsletterType) ? $newsletter->getId() : $newsletter;

		return $this->call('spoolNewsletter', ['newsletterid' => $newsletterId]);
	}
}