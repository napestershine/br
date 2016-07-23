<?php

namespace Brooter\PropertyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\PropertyBundle\Entity\PropertySpecification;
use Brooter\PropertyBundle\Form\PropertySpecificationType;

/**
 * PropertySpecification controller.
 *
 */
class PropertySpecificationController extends Controller
{
    /**
     * Lists all PropertySpecification entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propertySpecifications = $em->getRepository('BrooterPropertyBundle:PropertySpecification')->findAll();

        return $this->render('propertyspecification/index.html.twig', array(
            'propertySpecifications' => $propertySpecifications,
        ));
    }

    /**
     * Creates a new PropertySpecification entity.
     *
     */
    public function newAction(Request $request)
    {
        $propertySpecification = new PropertySpecification();
        $form = $this->createForm('Brooter\PropertyBundle\Form\PropertySpecificationType', $propertySpecification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertySpecification);
            $em->flush();

            return $this->redirectToRoute('propertyspecification_show', array('id' => $propertySpecification->getId()));
        }

        return $this->render('propertyspecification/new.html.twig', array(
            'propertySpecification' => $propertySpecification,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropertySpecification entity.
     *
     */
    public function showAction(PropertySpecification $propertySpecification)
    {
        $deleteForm = $this->createDeleteForm($propertySpecification);

        return $this->render('propertyspecification/show.html.twig', array(
            'propertySpecification' => $propertySpecification,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropertySpecification entity.
     *
     */
    public function editAction(Request $request, PropertySpecification $propertySpecification)
    {
        $deleteForm = $this->createDeleteForm($propertySpecification);
        $editForm = $this->createForm('Brooter\PropertyBundle\Form\PropertySpecificationType', $propertySpecification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertySpecification);
            $em->flush();

            return $this->redirectToRoute('propertyspecification_edit', array('id' => $propertySpecification->getId()));
        }

        return $this->render('propertyspecification/edit.html.twig', array(
            'propertySpecification' => $propertySpecification,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropertySpecification entity.
     *
     */
    public function deleteAction(Request $request, PropertySpecification $propertySpecification)
    {
        $form = $this->createDeleteForm($propertySpecification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propertySpecification);
            $em->flush();
        }

        return $this->redirectToRoute('propertyspecification_index');
    }

    /**
     * Creates a form to delete a PropertySpecification entity.
     *
     * @param PropertySpecification $propertySpecification The PropertySpecification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropertySpecification $propertySpecification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propertyspecification_delete', array('id' => $propertySpecification->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
