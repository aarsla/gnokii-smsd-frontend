<?php

namespace SMS\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Exclude;

/**
 * Inbox
 *
 * @ORM\Table(name="inbox", options={"charset"="utf8mb4", "collate"="utf8mb4_unicode_ci"})
 * @ORM\Entity
 * @ExclusionPolicy("none")
 */
class Inbox
{
    /**
     * @var integer
     *
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
     * @ORM\Column(name="smsdate", type="datetime", nullable=false, options={"default": "0000-00-00 00:00:00"})
     */
    private $smsdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insertdate", type="datetime", nullable=false, columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     * @Exclude
     */
    private $insertdate;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=true)
     */
    private $text;

    /**
     * @var boolean
     *
     * @ORM\Column(name="phone", type="smallint", nullable=true, options={"default": 0})
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
     * @return Inbox
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
     * Set smsdate
     *
     * @param \DateTime $smsdate
     * @return Inbox
     */
    public function setSmsdate($smsdate)
    {
        $this->smsdate = $smsdate;

        return $this;
    }

    /**
     * Get smsdate
     *
     * @return \DateTime
     */
    public function getSmsdate()
    {
        return $this->smsdate;
    }

    /**
     * Set insertdate
     *
     * @param \DateTime $insertdate
     * @return Inbox
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
     * @return Inbox
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
     * @return Inbox
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
     * @return Inbox
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
}
