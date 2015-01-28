<?php

namespace SMS\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="welcome")
     * @Template()
     */
    public function indexAction()
    {
    	if ($this->getUser()) {
    		return $this->redirect($this->generateUrl('admin_welcome'));
    	}
    	
        return array();
    }
    
    /**
     * @Route("/theme/{theme}", name="theme")
     * @Template()
     */
    public function themeAction($theme)
    {
    	$session = $this->getRequest()->getSession();
    	$session->set('theme', $theme);
    	
    	$referer = $this->getRequest()->headers->get('referer');
    	
    	$response = new RedirectResponse($referer);
    	$response->headers->setCookie(new Cookie('smsGwThemeCookie', $theme));
    	return $response;
    }

}
