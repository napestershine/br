<?php

namespace Brooter\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sliders = $em->getRepository('BrooterAdminBundle:Slider')->findAll();

        return $this->render('BrooterWebBundle:Default:index.html.twig',
            array(
                'sliders' => $sliders
            ));
    }

    public function aboutUsAction()
    {
        return $this->render('BrooterWebBundle:Default:aboutus.html.twig');
    }

    public function termsAction()
    {
        return $this->render('BrooterWebBundle:Default:termsofservice.html.twig');
    }

    public function dmcaAction()
    {
        return $this->render('BrooterWebBundle:Default:dmca.html.twig');
    }
}
