<?php

namespace SMS\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Exclude;

/**
 * Outbox
 *
 * @ORM\Table(name="outbox", options={"charset"="utf8mb4", "collate"="utf8mb4_unicode_ci"}, indexes={@ORM\Index(name="outbox_processed_ix", columns={"processed"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ExclusionPolicy("none")
 */
class Outbox
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=20, nullable=true)
     */
    private $number;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="processed_date", type="datetime", nullable=true, columnDefinition="TIMESTAMP DEFAULT 0")
     */
    private $processedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insertdate", type="datetime", nullable=false, columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $insertdate;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=160, nullable=true)
     */
    private $text;

    /**
     * @var boolean
     *
     * @ORM\Column(name="phone", type="smallint", nullable=true)
     * @Exclude
     */
    private $phone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="processed", type="smallint", nullable=false, options={"default": 0})
     */
    private $processed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="error", type="smallint", nullable=false, options={"default": -1})
     * @Exclude
     */
    private $error;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dreport", type="smallint", nullable=false, options={"default": 0})
     * @Exclude
     */
    private $dreport;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="not_before", type="time", nullable=false, options={"default": "00:00:00"})
     * @Exclude
     */
    private $notBefore;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="not_after", type="time", nullable=false, options={"default": "23:59:59"})
     * @Exclude
     */
    private $notAfter;



    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
    	//$this->processedDate = new \DateTime('0000-00-00 00:00:00');
    	$this->processedDate = null;
    	$this->insertdate = new \DateTime('now');
    	$this->processed = false;
    	$this->error = -1;
    	if (!$this->dreport) $this->dreport = 0;
    	if (!$this->notBefore) $this->notBefore = new \DateTime('00:00:00');
    	if (!$this->notAfter) $this->notAfter = new \DateTime('23:59:59');
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return Outbox
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set processedDate
     *
     * @param \DateTime $processedDate
     * @return Outbox
     */
    public function setProcessedDate($processedDate)
    {
        $this->processedDate = $processedDate;

        return $this;
    }

    /**
     * Get processedDate
     *
     * @return \DateTime
     */
    public function getProcessedDate()
    {
        return $this->processedDate;
    }

    /**
     * Set insertdate
     *
     * @param \DateTime $insertdate
     * @return Outbox
     */
    public function setInsertdate($insertdate)
    {
        $this->insertdate = $insertdate;

        return $this;
    }

    /**
     * Get insertdate
     *
     * @return \DateTime
     */
    public function getInsertdate()
    {
        return $this->insertdate;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Outbox
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set phone
     *
     * @param boolean $phone
     * @return Outbox
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return boolean
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set processed
     *
     * @param boolean $processed
     * @return Outbox
     */
    public function setProcessed($processed)
    {
        $this->processed = $processed;

        return $this;
    }

    /**
     * Get processed
     *
     * @return boolean
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * Set error
     *
     * @param boolean $error
     * @return Outbox
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get error
     *
     * @return boolean
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set dreport
     *
     * @param boolean $dreport
     * @return Outbox
     */
    public function setDreport($dreport)
    {
        $this->dreport = $dreport;

        return $this;
    }

    /**
     * Get dreport
     *
     * @return boolean
     */
    public function getDreport()
    {
        return $this->dreport;
    }

    /**
     * Set notBefore
     *
     * @param \DateTime $notBefore
     * @return Outbox
     */
    public function setNotBefore($notBefore)
    {
        $this->notBefore = $notBefore;

        return $this;
    }

    /**
     * Get notBefore
     *
     * @return \DateTime
     */
    public function getNotBefore()
    {
        return $this->notBefore;
    }

    /**
     * Set notAfter
     *
     * @param \DateTime $notAfter
     * @return Outbox
     */
    public function setNotAfter($notAfter)
    {
        $this->notAfter = $notAfter;

        return $this;
    }

    /**
     * Get notAfter
     *
     * @return \DateTime
     */
    public function getNotAfter()
    {
        return $this->notAfter;
    }
}
