<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\Availability;
use Brooter\AdminBundle\Form\AvailabilityType;

/**
 * Availability controller.
 *
 */
class AvailabilityController extends Controller
{
    /**
     * Lists all Availability entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $availabilities = $em->getRepository('BrooterAdminBundle:Availability')->findAll();

        return $this->render('availability/index.html.twig', array(
            'availabilities' => $availabilities,
        ));
    }

    /**
     * Creates a new Availability entity.
     *
     */
    public function newAction(Request $request)
    {
        $availability = new Availability();
        $form = $this->createForm('Brooter\AdminBundle\Form\AvailabilityType', $availability);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($availability);
            $em->flush();

            return $this->redirectToRoute('availability_show', array('id' => $availability->getId()));
        }

        return $this->render('availability/new.html.twig', array(
            'availability' => $availability,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Availability entity.
     *
     */
    public function showAction(Availability $availability)
    {
        $deleteForm = $this->createDeleteForm($availability);

        return $this->render('availability/show.html.twig', array(
            'availability' => $availability,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Availability entity.
     *
     */
    public function editAction(Request $request, Availability $availability)
    {
        $deleteForm = $this->createDeleteForm($availability);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\AvailabilityType', $availability);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($availability);
            $em->flush();

            return $this->redirectToRoute('availability_edit', array('id' => $availability->getId()));
        }

        return $this->render('availability/edit.html.twig', array(
            'availability' => $availability,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Availability entity.
     *
     */
    public function deleteAction(Request $request, Availability $availability)
    {
        $form = $this->createDeleteForm($availability);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($availability);
            $em->flush();
        }

        return $this->redirectToRoute('availability_index');
    }

    /**
     * Creates a form to delete a Availability entity.
     *
     * @param Availability $availability The Availability entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Availability $availability)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('availability_delete', array('id' => $availability->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
