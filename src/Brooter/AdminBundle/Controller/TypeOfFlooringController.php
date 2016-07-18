<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\TypeOfFlooring;
use Brooter\AdminBundle\Form\TypeOfFlooringType;

/**
 * TypeOfFlooring controller.
 *
 */
class TypeOfFlooringController extends Controller
{
    /**
     * Lists all TypeOfFlooring entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeOfFloorings = $em->getRepository('BrooterAdminBundle:TypeOfFlooring')->findAll();

        return $this->render('typeofflooring/index.html.twig', array(
            'typeOfFloorings' => $typeOfFloorings,
        ));
    }

    /**
     * Creates a new TypeOfFlooring entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeOfFlooring = new TypeOfFlooring();
        $form = $this->createForm('Brooter\AdminBundle\Form\TypeOfFlooringType', $typeOfFlooring);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeOfFlooring);
            $em->flush();

            return $this->redirectToRoute('typeofflooring_show', array('id' => $typeOfFlooring->getId()));
        }

        return $this->render('typeofflooring/new.html.twig', array(
            'typeOfFlooring' => $typeOfFlooring,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeOfFlooring entity.
     *
     */
    public function showAction(TypeOfFlooring $typeOfFlooring)
    {
        $deleteForm = $this->createDeleteForm($typeOfFlooring);

        return $this->render('typeofflooring/show.html.twig', array(
            'typeOfFlooring' => $typeOfFlooring,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeOfFlooring entity.
     *
     */
    public function editAction(Request $request, TypeOfFlooring $typeOfFlooring)
    {
        $deleteForm = $this->createDeleteForm($typeOfFlooring);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\TypeOfFlooringType', $typeOfFlooring);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeOfFlooring);
            $em->flush();

            return $this->redirectToRoute('typeofflooring_edit', array('id' => $typeOfFlooring->getId()));
        }

        return $this->render('typeofflooring/edit.html.twig', array(
            'typeOfFlooring' => $typeOfFlooring,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TypeOfFlooring entity.
     *
     */
    public function deleteAction(Request $request, TypeOfFlooring $typeOfFlooring)
    {
        $form = $this->createDeleteForm($typeOfFlooring);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeOfFlooring);
            $em->flush();
        }

        return $this->redirectToRoute('typeofflooring_index');
    }

    /**
     * Creates a form to delete a TypeOfFlooring entity.
     *
     * @param TypeOfFlooring $typeOfFlooring The TypeOfFlooring entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeOfFlooring $typeOfFlooring)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeofflooring_delete', array('id' => $typeOfFlooring->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
