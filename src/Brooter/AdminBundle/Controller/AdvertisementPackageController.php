<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\AdvertisementPackage;
use Brooter\AdminBundle\Form\AdvertisementPackageType;

/**
 * AdvertisementPackage controller.
 *
 */
class AdvertisementPackageController extends Controller
{
    /**
     * Lists all AdvertisementPackage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $advertisementPackages = $em->getRepository('BrooterAdminBundle:AdvertisementPackage')->findAll();

        return $this->render('advertisementpackage/index.html.twig', array(
            'advertisementPackages' => $advertisementPackages,
        ));
    }

    /**
     * Creates a new AdvertisementPackage entity.
     *
     */
    public function newAction(Request $request)
    {
        $advertisementPackage = new AdvertisementPackage();
        $form = $this->createForm('Brooter\AdminBundle\Form\AdvertisementPackageType', $advertisementPackage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advertisementPackage);
            $em->flush();

            return $this->redirectToRoute('advertisementpackage_show', array('id' => $advertisementPackage->getId()));
        }

        return $this->render('advertisementpackage/new.html.twig', array(
            'advertisementPackage' => $advertisementPackage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AdvertisementPackage entity.
     *
     */
    public function showAction(AdvertisementPackage $advertisementPackage)
    {
        $deleteForm = $this->createDeleteForm($advertisementPackage);

        return $this->render('advertisementpackage/show.html.twig', array(
            'advertisementPackage' => $advertisementPackage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AdvertisementPackage entity.
     *
     */
    public function editAction(Request $request, AdvertisementPackage $advertisementPackage)
    {
        $deleteForm = $this->createDeleteForm($advertisementPackage);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\AdvertisementPackageType', $advertisementPackage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advertisementPackage);
            $em->flush();

            return $this->redirectToRoute('advertisementpackage_edit', array('id' => $advertisementPackage->getId()));
        }

        return $this->render('advertisementpackage/edit.html.twig', array(
            'advertisementPackage' => $advertisementPackage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AdvertisementPackage entity.
     *
     */
    public function deleteAction(Request $request, AdvertisementPackage $advertisementPackage)
    {
        $form = $this->createDeleteForm($advertisementPackage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($advertisementPackage);
            $em->flush();
        }

        return $this->redirectToRoute('advertisementpackage_index');
    }

    /**
     * Creates a form to delete a AdvertisementPackage entity.
     *
     * @param AdvertisementPackage $advertisementPackage The AdvertisementPackage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AdvertisementPackage $advertisementPackage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('advertisementpackage_delete', array('id' => $advertisementPackage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
