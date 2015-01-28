<?php

namespace SMS\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use SMS\AdminBundle\Filter\InboxFilterType;
use SMS\AdminBundle\Filter\OutboxFilterType;
use SMS\AdminBundle\Entity\SMS;
use SMS\AdminBundle\Entity\Outbox;
use SMS\AdminBundle\Form\SMSType;

/**
 * Device controller.
 *
 * @Route("/admin/sms")
 */
class SMSController extends Controller
{
    /**
     * @Route("/inbox/{page}", name="admin_sms_inbox", requirements={"page" = "\d+"}, defaults={"page" = 1})
     * @Template()
     */
    public function inboxAction($page)
    {
    	$form = $this->get('form.factory')->create(new InboxFilterType());
    	
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->getRepository('SMSAdminBundle:Inbox')->findBy(array(), array('id' => 'DESC'));
    	
    	if ($this->get('request')->query->has('submit-filter')) {
    		$form->bind($this->getRequest());
    	
    		// initliaze a query builder
    		$query = $em->getRepository('SMSAdminBundle:Inbox')->createQueryBuilder('i');
    	
    		// build the query from the given form object
    		$this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $query);
    		//var_dump($query->getDql());
    	}
    	
    	$paginator  = $this->get('knp_paginator');
    	$pagination = $paginator->paginate(
    			$query,
    			$this->get('request')->query->get('page', $page),
    			10
    	);
    	
    	$csrf = $this->get('form.csrf_provider');
    	
    	return array(
    			'form' => $form->createView(),
    			'pagination' => $pagination,
    			'csrf' => $csrf
    	);
    	
        return array();
    }

    /**
     * @Route("/outbox/{page}", name="admin_sms_outbox", requirements={"page" = "\d+"}, defaults={"page" = 1})
     * @Template()
     */
    public function outboxAction($page)
    {
    	$form = $this->get('form.factory')->create(new OutboxFilterType());
    	 
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->getRepository('SMSAdminBundle:Outbox')->findBy(array(), array('id' => 'DESC'));
    	 
    	if ($this->get('request')->query->has('submit-filter')) {
    		$form->bind($this->getRequest());
    		 
    		// initliaze a query builder
    		$query = $em->getRepository('SMSAdminBundle:Outbox')->createQueryBuilder('i');
    		 
    		// build the query from the given form object
    		$this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $query);
    		//var_dump($query->getDql());
    	}
    	 
    	$paginator  = $this->get('knp_paginator');
    	$pagination = $paginator->paginate(
    			$query,
    			$this->get('request')->query->get('page', $page),
    			10
    	);
    	 
    	$csrf = $this->get('form.csrf_provider');
    	
    	return array(
    			'form' => $form->createView(),
    			'pagination' => $pagination,
    			'csrf' => $csrf
    	);
    	 
    	return array();
    }
    
    /**
     * Creates a new SMS entity.
     *
     * @Route("/new", name="admin_sms_create")
     * @Method("POST")
     * @Template("SMSAdminBundle:SMS:new.html.twig")
     */
    public function createAction(Request $request)
    {
    	$entity = new SMS();
    	//$entity->setUser($this->getUser());
    
    	$form = $this->createCreateForm($entity);
    	$form->handleRequest($request);
    
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		
    		$message = new Outbox();
    		$message->setNumber($entity->getNumber());
    		$message->setText($entity->getText());

    		/*
    		$message->setProcessedDate(new \DateTime());
    		$message->setInsertDate(new \DateTime());
    		$message->setProcessed(false);
    		$message->setError(false);
    		$message->setDreport(false);
    		$message->setNotBefore(new \DateTime('00:00:00'));
    		$message->setNotAfter(new \DateTime('23:59:59'));
    		*/

    		try {
    			$em->persist($message);
    			$em->flush();
    		} catch(\Exception $e) {
    			$this->get('session')->getFlashBag()->add(
    					'error',
    					$e->getMessage()
    			);

    			$url = $this->getRequest()->headers->get("referer");
    			return $this->redirect($url);
    		}
    
    		$this->get('session')->getFlashBag()->add(
    				'success',
    				'SMS successfully created'
    		);
    
    		return $this->redirect($this->generateUrl('admin_sms_outbox'));
    		//return $this->redirect($this->generateUrl('admin_sms_show', array('id' => $entity->getId())));
    	}
    
    	return array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	);
    }
    
    /**
     * Creates a form to create a SMS entity.
     *
     * @param SMS $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SMS $entity)
    {
    	$form = $this->createForm(new SMSType(), $entity, array(
    			'action' => $this->generateUrl('admin_sms_create'),
    			'method' => 'POST',
    	));
    
    	//$form->add('submit', 'submit', array('label' => 'Create'));
    
    	return $form;
    }
    
    /**
     * Displays a form to create a new SMS entity.
     *
     * @Route("/new", name="admin_sms_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	 
    	$entity = new SMS();
    	$form   = $this->createCreateForm($entity);
    
    	return array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	);
    }
    
    /**
     * Deletes a SMS Outbox entity.
     *
     * @Route("/delete/{id}", name="admin_sms_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
   		$em = $this->getDoctrine()->getManager();
   		$entity = $em->getRepository('SMSAdminBundle:Outbox')->find($id);
    
   		if (!$entity) {
   			throw $this->createNotFoundException('Unable to find SMS.');
   		}
        
   		if ($entity->getProcessed() === true) {
   			$this->get('session')->getFlashBag()->add(
   					'error',
   					'SMS is already processed'
   			);
   			return $this->redirect($this->generateUrl('admin_sms_outbox'));
   		}
    		
		$em->remove($entity);
		$em->flush();
    
    	$this->get('session')->getFlashBag()->add(
    			'success',
    			'SMS deleted'
    	);
    
    	return $this->redirect($this->generateUrl('admin_sms_outbox'));
    }
}
