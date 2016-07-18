<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\ReservedParking;
use Brooter\AdminBundle\Form\ReservedParkingType;

/**
 * ReservedParking controller.
 *
 */
class ReservedParkingController extends Controller
{
    /**
     * Lists all ReservedParking entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservedParkings = $em->getRepository('BrooterAdminBundle:ReservedParking')->findAll();

        return $this->render('reservedparking/index.html.twig', array(
            'reservedParkings' => $reservedParkings,
        ));
    }

    /**
     * Creates a new ReservedParking entity.
     *
     */
    public function newAction(Request $request)
    {
        $reservedParking = new ReservedParking();
        $form = $this->createForm('Brooter\AdminBundle\Form\ReservedParkingType', $reservedParking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservedParking);
            $em->flush();

            return $this->redirectToRoute('reservedparking_show', array('id' => $reservedParking->getId()));
        }

        return $this->render('reservedparking/new.html.twig', array(
            'reservedParking' => $reservedParking,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ReservedParking entity.
     *
     */
    public function showAction(ReservedParking $reservedParking)
    {
        $deleteForm = $this->createDeleteForm($reservedParking);

        return $this->render('reservedparking/show.html.twig', array(
            'reservedParking' => $reservedParking,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ReservedParking entity.
     *
     */
    public function editAction(Request $request, ReservedParking $reservedParking)
    {
        $deleteForm = $this->createDeleteForm($reservedParking);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\ReservedParkingType', $reservedParking);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservedParking);
            $em->flush();

            return $this->redirectToRoute('reservedparking_edit', array('id' => $reservedParking->getId()));
        }

        return $this->render('reservedparking/edit.html.twig', array(
            'reservedParking' => $reservedParking,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ReservedParking entity.
     *
     */
    public function deleteAction(Request $request, ReservedParking $reservedParking)
    {
        $form = $this->createDeleteForm($reservedParking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservedParking);
            $em->flush();
        }

        return $this->redirectToRoute('reservedparking_index');
    }

    /**
     * Creates a form to delete a ReservedParking entity.
     *
     * @param ReservedParking $reservedParking The ReservedParking entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ReservedParking $reservedParking)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservedparking_delete', array('id' => $reservedParking->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
