<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrooterAdminBundle:Default:index.html.twig');
    }
}
