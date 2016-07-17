<?php

namespace Brooter\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sliders = $em->getRepository('BrooterAdminBundle:Slider')->findAll();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);

        return $this->render('BrooterWebBundle:Default:index.html.twig', [
            'sliders' => $sliders, 'company' => $company]);
    }

    public function aboutUsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        return $this->render('BrooterWebBundle:Default:aboutus.html.twig', ['company' => $company]);
    }

    public function termsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        return $this->render('BrooterWebBundle:Default:termsofservice.html.twig', ['company' => $company]);
    }

    public function dmcaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        return $this->render('BrooterWebBundle:Default:dmca.html.twig', ['company' => $company]);
    }

    public function faqAction()
    {
        $em = $this->getDoctrine()->getManager();
        $faqs = $em->getRepository('BrooterAdminBundle:Faq')->findAll();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        return $this->render('BrooterWebBundle:Default:faq.html.twig', ['faqs' => $faqs, 'company' => $company]);
    }
}
