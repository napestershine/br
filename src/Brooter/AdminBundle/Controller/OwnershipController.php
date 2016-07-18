<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\Ownership;
use Brooter\AdminBundle\Form\OwnershipType;

/**
 * Ownership controller.
 *
 */
class OwnershipController extends Controller
{
    /**
     * Lists all Ownership entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ownerships = $em->getRepository('BrooterAdminBundle:Ownership')->findAll();

        return $this->render('ownership/index.html.twig', array(
            'ownerships' => $ownerships,
        ));
    }

    /**
     * Creates a new Ownership entity.
     *
     */
    public function newAction(Request $request)
    {
        $ownership = new Ownership();
        $form = $this->createForm('Brooter\AdminBundle\Form\OwnershipType', $ownership);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ownership);
            $em->flush();

            return $this->redirectToRoute('ownership_show', array('id' => $ownership->getId()));
        }

        return $this->render('ownership/new.html.twig', array(
            'ownership' => $ownership,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ownership entity.
     *
     */
    public function showAction(Ownership $ownership)
    {
        $deleteForm = $this->createDeleteForm($ownership);

        return $this->render('ownership/show.html.twig', array(
            'ownership' => $ownership,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ownership entity.
     *
     */
    public function editAction(Request $request, Ownership $ownership)
    {
        $deleteForm = $this->createDeleteForm($ownership);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\OwnershipType', $ownership);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ownership);
            $em->flush();

            return $this->redirectToRoute('ownership_edit', array('id' => $ownership->getId()));
        }

        return $this->render('ownership/edit.html.twig', array(
            'ownership' => $ownership,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ownership entity.
     *
     */
    public function deleteAction(Request $request, Ownership $ownership)
    {
        $form = $this->createDeleteForm($ownership);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ownership);
            $em->flush();
        }

        return $this->redirectToRoute('ownership_index');
    }

    /**
     * Creates a form to delete a Ownership entity.
     *
     * @param Ownership $ownership The Ownership entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ownership $ownership)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ownership_delete', array('id' => $ownership->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
