<?php

namespace Brooter\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrooterPaymentBundle:Default:index.html.twig');
    }
}
