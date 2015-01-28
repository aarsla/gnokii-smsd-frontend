<?php

namespace SMS\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\Util\Codes;
use SMS\AdminBundle\Entity\SMS;
use SMS\AdminBundle\Form\SMSApiType;
use SMS\AdminBundle\Entity\Inbox;
use SMS\AdminBundle\Entity\Outbox;

class ApiController extends FOSRestController
{
	/**
	 * Creates a new SMS entity.
	 * @Post("/sms")
	 * @var Request $request
	 * @return View|array
	 */
	public function smsAction(Request $request)
	{
		$number = $request->get('number');
		$text = $request->get('text');
		
		$entity = new SMS($number, $text);
		$form = $this->createForm(new SMSApiType(), $entity);
		$form->bind($request);
	
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
	
			$message = new Outbox();
			$message->setNumber($entity->getNumber());
			$message->setText($entity->getText());
	
			$em->persist($message);
			$em->flush();

			return $this->redirect($this->generateUrl('get_outbox', array('outbox' => $message->getId())));
		}
		
		return array(
				'form' => $form,
		);
	}
	
	/**
	 * @return array
	 * @View()
	 */
    public function getInboxesAction()
    {
    	$messages = $this->getDoctrine()->getRepository('SMSAdminBundle:Inbox')->findAll();
        return array('messages' => $messages);
    }

    /**
     * @param Inbox $inbox
     * @return multitype:Inbox
     * @View()
     * @ParamConverter("inbox", class="SMSAdminBundle:Inbox")
     */
    public function getInboxAction(Inbox $inbox)
    {
    	return array('message' => $inbox);
    }
    
    /**
     * @return array
     * @View()
     */
    public function getOutboxesAction()
    {
    	$messages = $this->getDoctrine()->getRepository('SMSAdminBundle:Outbox')->findAll();
    	return array('messages' => $messages);
    }
    
    /**
     * @param Outbox $outbox
     * @return multitype:Outbox
     * @View()
     * @ParamConverter("outbox", class="SMSAdminBundle:Outbox")
     */
    public function getOutboxAction(Outbox $outbox)
    {
    	return array('message' => $outbox);
    }
}
