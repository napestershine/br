<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\Overlooking;
use Brooter\AdminBundle\Form\OverlookingType;

/**
 * Overlooking controller.
 *
 */
class OverlookingController extends Controller
{
    /**
     * Lists all Overlooking entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $overlookings = $em->getRepository('BrooterAdminBundle:Overlooking')->findAll();

        return $this->render('overlooking/index.html.twig', array(
            'overlookings' => $overlookings,
        ));
    }

    /**
     * Creates a new Overlooking entity.
     *
     */
    public function newAction(Request $request)
    {
        $overlooking = new Overlooking();
        $form = $this->createForm('Brooter\AdminBundle\Form\OverlookingType', $overlooking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($overlooking);
            $em->flush();

            return $this->redirectToRoute('overlooking_show', array('id' => $overlooking->getId()));
        }

        return $this->render('overlooking/new.html.twig', array(
            'overlooking' => $overlooking,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Overlooking entity.
     *
     */
    public function showAction(Overlooking $overlooking)
    {
        $deleteForm = $this->createDeleteForm($overlooking);

        return $this->render('overlooking/show.html.twig', array(
            'overlooking' => $overlooking,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Overlooking entity.
     *
     */
    public function editAction(Request $request, Overlooking $overlooking)
    {
        $deleteForm = $this->createDeleteForm($overlooking);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\OverlookingType', $overlooking);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($overlooking);
            $em->flush();

            return $this->redirectToRoute('overlooking_edit', array('id' => $overlooking->getId()));
        }

        return $this->render('overlooking/edit.html.twig', array(
            'overlooking' => $overlooking,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Overlooking entity.
     *
     */
    public function deleteAction(Request $request, Overlooking $overlooking)
    {
        $form = $this->createDeleteForm($overlooking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($overlooking);
            $em->flush();
        }

        return $this->redirectToRoute('overlooking_index');
    }

    /**
     * Creates a form to delete a Overlooking entity.
     *
     * @param Overlooking $overlooking The Overlooking entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Overlooking $overlooking)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('overlooking_delete', array('id' => $overlooking->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
