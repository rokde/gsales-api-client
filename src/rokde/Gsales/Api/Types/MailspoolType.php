<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 03.04.14
 * Time: 16:07
 */

namespace Rokde\Gsales\Api\Types;


use DateTime;
use Rokde\Gsales\Api\Contracts\IdentifierInterface;
use Rokde\Gsales\Api\Contracts\MailFormat;

class MailspoolType extends Type implements IdentifierInterface
{

	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $created;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $sent;

	/**
	 * @var string date(Y-m-d H:i:s)
	 */
	protected $tracked;

	/**
	 * @var string
	 */
	protected $subject;

	/**
	 * @var string
	 */
	protected $body;

	/**
	 * @var string
	 */
	protected $body_plain;

	/**
	 * @var string
	 */
	protected $to_name;

	/**
	 * @var string
	 */
	protected $to_email;

	/**
	 * @var string
	 */
	protected $errors;

	/**
	 * @var string
	 */
	protected $from_name;

	/**
	 * @var string
	 */
	protected $from_email;

	/**
	 * @var int
	 */
	protected $send_approval;

	/**
	 * @var string
	 */
	protected $sub;

	/**
	 * @var int
	 */
	protected $sub_recordset_id;

	/**
	 * @var int
	 */
	protected $sendplan_actionid;

	/**
	 * @var int
	 */
	protected $mailformat = MailFormat::HTML_AND_PLAINTEXT;

	/**
	 * @var Attachment[]
	 */
	protected $attachements = array();

	/**
	 * sets attachments
	 *
	 * @param \Rokde\Gsales\Api\Types\Attachment[] $attachements
	 * @return $this
	 */
	public function setAttachments($attachements)
	{
		$this->attachements = $attachements;
		return $this;
	}

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
	 * adds an attachment
	 *
	 * @param Attachment $attachment
	 * @return $this
	 */
	public function addAttachment(Attachment $attachment)
	{
		$this->attachements[] = $attachment;
		return $this;
	}

	/**
	 * sets body
	 *
	 * @param string $body
	 * @param string $plain
	 * @return $this
	 */
	public function setBody($body, $plain = '')
	{
		$this->body = $body;
		if ($plain != '')
			$this->setBodyPlain($plain);
		return $this;
	}

	/**
	 * returns Body
	 *
	 * @return string
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * sets body_plain
	 *
	 * @param string $body_plain
	 * @return $this
	 */
	public function setBodyPlain($body_plain)
	{
		$this->body_plain = $body_plain;
		return $this;
	}

	/**
	 * returns BodyPlain
	 *
	 * @return string
	 */
	public function getBodyPlain()
	{
		return $this->body_plain;
	}

	/**
	 * sets created
	 *
	 * @param string $created
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
	 * @return string|DateTime
	 */
	public function getCreated($formatted = true)
	{
		if ($formatted)
			return DateTime::createFromFormat('Y-m-d H:i:s', $this->created);

		return $this->created;
	}

	/**
	 * sets errors
	 *
	 * @param string $errors
	 * @return $this
	 */
	public function setErrors($errors)
	{
		$this->errors = $errors;
		return $this;
	}

	/**
	 * returns Errors
	 *
	 * @return string
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * sets from_email
	 *
	 * @param string $from_email
	 * @return $this
	 */
	public function setFromEmail($from_email)
	{
		$this->from_email = $from_email;
		return $this;
	}

	/**
	 * returns FromEmail
	 *
	 * @return string
	 */
	public function getFromEmail()
	{
		return $this->from_email;
	}

	/**
	 * sets from_name
	 *
	 * @param string $from_name
	 * @return $this
	 */
	public function setFromName($from_name)
	{
		$this->from_name = $from_name;
		return $this;
	}

	/**
	 * returns FromName
	 *
	 * @return string
	 */
	public function getFromName()
	{
		return $this->from_name;
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
	 * sets mailformat
	 *
	 * @param int|\Rokde\Gsales\Api\Contracts\MailFormat $mailformat
	 * @return $this
	 */
	public function setMailFormat(MailFormat $mailformat)
	{
		$this->mailformat = $mailformat;
		return $this;
	}

	/**
	 * returns Mailformat
	 *
	 * @return int
	 */
	public function getMailformat()
	{
		return $this->mailformat;
	}

	/**
	 * sets send_approval
	 *
	 * @param int $send_approval
	 * @return $this
	 */
	public function setSendApproval($send_approval)
	{
		$this->send_approval = $send_approval;
		return $this;
	}

	/**
	 * returns SendApproval
	 *
	 * @return int
	 */
	public function getSendApproval()
	{
		return $this->send_approval;
	}

	/**
	 * sets sendplan_actionid
	 *
	 * @param int $sendplan_actionid
	 * @return $this
	 */
	public function setSendplanActionid($sendplan_actionid)
	{
		$this->sendplan_actionid = $sendplan_actionid;
		return $this;
	}

	/**
	 * returns SendplanActionid
	 *
	 * @return int
	 */
	public function getSendplanActionid()
	{
		return $this->sendplan_actionid;
	}

	/**
	 * sets sent
	 *
	 * @param string $sent
	 * @return $this
	 */
	public function setSent($sent)
	{
		$this->sent = $sent;
		return $this;
	}

	/**
	 * returns Sent
	 *
	 * @return string
	 */
	public function getSent()
	{
		return $this->sent;
	}

	/**
	 * sets sub
	 *
	 * @param string $sub
	 * @return $this
	 */
	public function setSub($sub)
	{
		$this->sub = $sub;
		return $this;
	}

	/**
	 * returns Sub
	 *
	 * @return string
	 */
	public function getSub()
	{
		return $this->sub;
	}

	/**
	 * sets sub_recordset_id
	 *
	 * @param int $sub_recordset_id
	 * @return $this
	 */
	public function setSubRecordsetId($sub_recordset_id)
	{
		$this->sub_recordset_id = $sub_recordset_id;
		return $this;
	}

	/**
	 * returns SubRecordsetId
	 *
	 * @return int
	 */
	public function getSubRecordsetId()
	{
		return $this->sub_recordset_id;
	}

	/**
	 * sets subject
	 *
	 * @param string $subject
	 * @return $this
	 */
	public function setSubject($subject)
	{
		$this->subject = $subject;
		return $this;
	}

	/**
	 * returns Subject
	 *
	 * @return string
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * sets to_email
	 *
	 * @param string $to_email
	 * @return $this
	 */
	public function setToEmail($to_email)
	{
		$this->to_email = $to_email;
		return $this;
	}

	/**
	 * returns ToEmail
	 *
	 * @return string
	 */
	public function getToEmail()
	{
		return $this->to_email;
	}

	/**
	 * sets to_name
	 *
	 * @param string $to_name
	 * @return $this
	 */
	public function setToName($to_name)
	{
		$this->to_name = $to_name;
		return $this;
	}

	/**
	 * returns ToName
	 *
	 * @return string
	 */
	public function getToName()
	{
		return $this->to_name;
	}

	/**
	 * sets tracked
	 *
	 * @param string $tracked
	 * @return $this
	 */
	public function setTracked($tracked)
	{
		$this->tracked = $tracked;
		return $this;
	}

	/**
	 * returns Tracked
	 *
	 * @return string
	 */
	public function getTracked()
	{
		return $this->tracked;
	}


} 