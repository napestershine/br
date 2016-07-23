<?php

namespace Brooter\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrooterUserBundle:Default:index.html.twig');
    }
}
