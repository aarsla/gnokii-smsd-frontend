<?php

namespace SMS\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Multipartinbox
 *
 * @ORM\Table(name="multipartinbox", options={"charset"="utf8mb4", "collate"="utf8mb4_unicode_ci"})
 * @ORM\Entity
 */
class Multipartinbox
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
     * @ORM\Column(name="insertdate", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
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
     * @ORM\Column(name="phone", type="smallint", nullable=true)
     */
    private $phone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="processed", type="smallint", nullable=false, options={"default": 0})
     */
    private $processed;

    /**
     * @var integer
     *
     * @ORM\Column(name="refnum", type="integer", nullable=true)
     */
    private $refnum;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxnum", type="integer", nullable=true)
     */
    private $maxnum;

    /**
     * @var integer
     *
     * @ORM\Column(name="curnum", type="integer", nullable=true)
     */
    private $curnum;



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
     * @return Multipartinbox
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
     * @return Multipartinbox
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
     * @return Multipartinbox
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
     * @return Multipartinbox
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
     * @return Multipartinbox
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
     * @return Multipartinbox
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
     * Set refnum
     *
     * @param integer $refnum
     * @return Multipartinbox
     */
    public function setRefnum($refnum)
    {
        $this->refnum = $refnum;

        return $this;
    }

    /**
     * Get refnum
     *
     * @return integer
     */
    public function getRefnum()
    {
        return $this->refnum;
    }

    /**
     * Set maxnum
     *
     * @param integer $maxnum
     * @return Multipartinbox
     */
    public function setMaxnum($maxnum)
    {
        $this->maxnum = $maxnum;

        return $this;
    }

    /**
     * Get maxnum
     *
     * @return integer
     */
    public function getMaxnum()
    {
        return $this->maxnum;
    }

    /**
     * Set curnum
     *
     * @param integer $curnum
     * @return Multipartinbox
     */
    public function setCurnum($curnum)
    {
        $this->curnum = $curnum;

        return $this;
    }

    /**
     * Get curnum
     *
     * @return integer
     */
    public function getCurnum()
    {
        return $this->curnum;
    }
}
