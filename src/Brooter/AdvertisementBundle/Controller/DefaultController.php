<?php

namespace Brooter\AdvertisementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrooterAdvertisementBundle:Default:index.html.twig');
    }
}
