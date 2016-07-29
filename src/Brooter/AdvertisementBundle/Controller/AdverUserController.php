<?php

namespace Brooter\AdvertisementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Brooter\AdvertisementBundle\Entity\AdverUser;
use Brooter\AdminBundle\Entity\AdvertisementPackage;
use Symfony\Component\HttpFoundation\Request;

class AdverUserController extends Controller
{
    public function newAction(Request $request)
    {




        $user = $this->get('security.token_storage')->getToken()->getUser();
        $adverUser = new AdverUser($user,null);
        $form = $this->createForm('Brooter\AdvertisementBundle\Form\AdverUserType', $adverUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $adverUser->setStartdate(new \DateTime('now'));
            $endDate=strtotime("+365 day");
            $adverUser->setEnddate($endDate);
            $adverUser->setAdverstatus(true);
            $adverUser->setTotalcreditused(0);
            
            $adPack=$adverUser->getAdpack();
            $adverUser->setTotalremainingcredit($adPack->getTotalcreditperyear());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($adverUser);
            $em->flush();

            return $this->redirectToRoute('payum_capture_do');
        }
        
        
        return $this->render('BrooterAdvertisementBundle:AdverUser:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
