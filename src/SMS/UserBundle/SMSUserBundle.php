<?php

namespace SMS\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SMSUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
