<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PropertyFacing;
use Brooter\AdminBundle\Form\PropertyFacingType;

/**
 * PropertyFacing controller.
 *
 */
class PropertyFacingController extends Controller
{
    /**
     * Lists all PropertyFacing entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propertyFacings = $em->getRepository('BrooterAdminBundle:PropertyFacing')->findAll();

        return $this->render('propertyfacing/index.html.twig', array(
            'propertyFacings' => $propertyFacings,
        ));
    }

    /**
     * Creates a new PropertyFacing entity.
     *
     */
    public function newAction(Request $request)
    {
        $propertyFacing = new PropertyFacing();
        $form = $this->createForm('Brooter\AdminBundle\Form\PropertyFacingType', $propertyFacing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyFacing);
            $em->flush();

            return $this->redirectToRoute('propertyfacing_show', array('id' => $propertyFacing->getId()));
        }

        return $this->render('propertyfacing/new.html.twig', array(
            'propertyFacing' => $propertyFacing,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropertyFacing entity.
     *
     */
    public function showAction(PropertyFacing $propertyFacing)
    {
        $deleteForm = $this->createDeleteForm($propertyFacing);

        return $this->render('propertyfacing/show.html.twig', array(
            'propertyFacing' => $propertyFacing,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropertyFacing entity.
     *
     */
    public function editAction(Request $request, PropertyFacing $propertyFacing)
    {
        $deleteForm = $this->createDeleteForm($propertyFacing);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PropertyFacingType', $propertyFacing);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyFacing);
            $em->flush();

            return $this->redirectToRoute('propertyfacing_edit', array('id' => $propertyFacing->getId()));
        }

        return $this->render('propertyfacing/edit.html.twig', array(
            'propertyFacing' => $propertyFacing,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropertyFacing entity.
     *
     */
    public function deleteAction(Request $request, PropertyFacing $propertyFacing)
    {
        $form = $this->createDeleteForm($propertyFacing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propertyFacing);
            $em->flush();
        }

        return $this->redirectToRoute('propertyfacing_index');
    }

    /**
     * Creates a form to delete a PropertyFacing entity.
     *
     * @param PropertyFacing $propertyFacing The PropertyFacing entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropertyFacing $propertyFacing)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propertyfacing_delete', array('id' => $propertyFacing->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
