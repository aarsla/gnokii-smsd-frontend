<?php

namespace SMS\AdminBundle\Entity;

/**
 * SMS Message
 */
class SMS
{
	private $number;
	private $text;

	public function __construct($number = null, $text = null)
	{
		$this->number = $number;
		$this->text = $text;
	}
	
	/**
	 * Set number
	 *
	 * @param string $number
	 * @return SMS
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
	 * Set text
	 *
	 * @param string $text
	 * @return SMS
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
	 * Send SMS
	 */
	public function send()
	{
		return "sent";
	}
}