<?php

namespace Brooter\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrooterWebBundle:Default:index.html.twig');
    }
}
