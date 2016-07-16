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
}
