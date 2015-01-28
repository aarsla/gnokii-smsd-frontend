<?php

namespace SMS\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Help controller.
 *
 * @Route("/admin/help")
 */
class HelpController extends Controller
{
    /**
     * @Route("/", name="admin_help")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}