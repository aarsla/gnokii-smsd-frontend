<?php

namespace Acme\AdminBundle\Twig;

use Symfony\Component\HttpFoundation\RequestStack;


class PageExtension extends \Twig_Extension
{
protected $request;

    public function setRequest(RequestStack $request_stack)
    {
        $this->request = $request_stack->getCurrentRequest();
    }
	
	public function getFunctions()
	{
		return array(
	            'get_controller_name' => new \Twig_Function_Method($this, 'getControllerName'),
	            'get_action_name' => new \Twig_Function_Method($this, 'getActionName'),
		);
	}
	
	/**
	 * Get current controller name
	 */
	public function getControllerName()
	{
		//return $this->request->attributes->get('_template')->get('controller');
		
		$pattern = "#Controller\\\([a-zA-Z]*)Controller#";
		$matches = array();
		preg_match($pattern, $this->request->get('_controller'), $matches);

		return strtolower($matches[1]);
	}
	
	/**
	 * Get current action name
	 */
	public function getActionName()
	{
		$pattern = "#::([a-zA-Z]*)Action#";
		$matches = array();
		preg_match($pattern, $this->request->get('_controller'), $matches);
	
		return $matches[1];
	}
	
	public function getName()
	{
		return 'page_extension';
	}
}

