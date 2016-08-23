<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\AgeOfProperty;
use Brooter\AdminBundle\Form\AgeOfPropertyType;

/**
 * AgeOfProperty controller.
 *
 */
class AgeOfPropertyController extends Controller
{
    /**
     * Lists all AgeOfProperty entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ageOfProperties = $em->getRepository('BrooterAdminBundle:AgeOfProperty')->findAll();

        return $this->render('ageofproperty/index.html.twig', array(
            'ageOfProperties' => $ageOfProperties,
        ));
    }

    /**
     * Creates a new AgeOfProperty entity.
     *
     */
    public function newAction(Request $request)
    {
        $ageOfProperty = new AgeOfProperty();
        $form = $this->createForm('Brooter\AdminBundle\Form\AgeOfPropertyType', $ageOfProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ageOfProperty);
            $em->flush();

            return $this->redirectToRoute('ageofproperty_show', array('id' => $ageOfProperty->getId()));
        }

        return $this->render('ageofproperty/new.html.twig', array(
            'ageOfProperty' => $ageOfProperty,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AgeOfProperty entity.
     *
     */
    public function showAction(AgeOfProperty $ageOfProperty)
    {
        $deleteForm = $this->createDeleteForm($ageOfProperty);

        return $this->render('ageofproperty/show.html.twig', array(
            'ageOfProperty' => $ageOfProperty,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AgeOfProperty entity.
     *
     */
    public function editAction(Request $request, AgeOfProperty $ageOfProperty)
    {
        $deleteForm = $this->createDeleteForm($ageOfProperty);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\AgeOfPropertyType', $ageOfProperty);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ageOfProperty);
            $em->flush();

            return $this->redirectToRoute('ageofproperty_edit', array('id' => $ageOfProperty->getId()));
        }

        return $this->render('ageofproperty/edit.html.twig', array(
            'ageOfProperty' => $ageOfProperty,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AgeOfProperty entity.
     *
     */
    public function deleteAction(Request $request, AgeOfProperty $ageOfProperty)
    {
        $form = $this->createDeleteForm($ageOfProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ageOfProperty);
            $em->flush();
        }

        return $this->redirectToRoute('ageofproperty_index');
    }

    /**
     * Creates a form to delete a AgeOfProperty entity.
     *
     * @param AgeOfProperty $ageOfProperty The AgeOfProperty entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AgeOfProperty $ageOfProperty)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ageofproperty_delete', array('id' => $ageOfProperty->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
