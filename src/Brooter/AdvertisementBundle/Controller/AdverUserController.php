<?php

namespace Brooter\AdvertisementBundle\Controller;

use Brooter\PaymentBundle\Controller\PaymentController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Brooter\AdvertisementBundle\Entity\AdverUser;
use Brooter\AdminBundle\Entity\AdvertisementPackage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AdverUserController extends Controller
{
    public function newAction(Request $request)
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $adverUser = new AdverUser($user,null);

        $form = $this->createForm('Brooter\AdvertisementBundle\Form\AdverUserType', $adverUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $adverUser->setStartdate(new \DateTime());

            $endDate = $end = new \DateTime(date('Y-m-d', strtotime('+1 years')));
            $adverUser->setEnddate($endDate);

            $session = $request->getSession();
            $session->set('AdverUser',$adverUser );
            



            return $this->redirectToRoute('brooter_payment_prepare');
            //return $this->redirectToRoute('payum_capture_do');
        }


        return $this->render('BrooterAdvertisementBundle:AdverUser:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
