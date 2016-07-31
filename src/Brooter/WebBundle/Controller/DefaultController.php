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
        $aboutus = $em->getRepository('BrooterAdminBundle:CMS')->findOneById(1)->getAboutus();
        return $this->render('BrooterWebBundle:Default:aboutus.html.twig', ['company' => $company, 'aboutus' => $aboutus]);
    }

    public function termsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        $terms = $em->getRepository('BrooterAdminBundle:CMS')->findOneById(1)->getTerms();
        return $this->render('BrooterWebBundle:Default:termsofservice.html.twig', ['company' => $company, 'terms' => $terms]);
    }

    public function dmcaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        $dmca = $em->getRepository('BrooterAdminBundle:CMS')->findOneById(1)->getDmca();
        return $this->render('BrooterWebBundle:Default:dmca.html.twig', ['company' => $company, 'dmca' => $dmca]);
    }

    public function faqAction()
    {
        $em = $this->getDoctrine()->getManager();
        $faqs = $em->getRepository('BrooterAdminBundle:Faq')->findAll();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        return $this->render('BrooterWebBundle:Default:faq.html.twig', ['faqs' => $faqs, 'company' => $company]);
    }

    public function privacyPolicyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        $policy = $em->getRepository('BrooterAdminBundle:CMS')->findOneById(1)->getPrivacypolicy();
        return $this->render('BrooterWebBundle:Default:privacypolicy.html.twig', ['company' => $company, 'policy' => $policy]);
    }

    public function copyrightAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        $copyright = $em->getRepository('BrooterAdminBundle:CMS')->findOneById(1)->getCopyright();
        return $this->render('BrooterWebBundle:Default:copyright.html.twig', ['company' => $company, 'copyright' => $copyright]);
    }

    public function contactUsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        return $this->render('BrooterWebBundle:Default:contactus.html.twig', ['company' => $company]);
    }
}