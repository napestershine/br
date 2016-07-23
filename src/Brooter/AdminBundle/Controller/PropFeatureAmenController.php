<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PropFeatureAmen;
use Brooter\AdminBundle\Form\PropFeatureAmenType;

/**
 * PropFeatureAmen controller.
 *
 */
class PropFeatureAmenController extends Controller
{
    /**
     * Lists all PropFeatureAmen entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propFeatureAmens = $em->getRepository('BrooterAdminBundle:PropFeatureAmen')->findAll();

        return $this->render('propfeatureamen/index.html.twig', array(
            'propFeatureAmens' => $propFeatureAmens,
        ));
    }

    /**
     * Creates a new PropFeatureAmen entity.
     *
     */
    public function newAction(Request $request)
    {
        $propFeatureAman = new PropFeatureAmen();
        $form = $this->createForm('Brooter\AdminBundle\Form\PropFeatureAmenType', $propFeatureAman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propFeatureAman);
            $em->flush();

            return $this->redirectToRoute('propfeatureamen_show', array('id' => $propFeatureAman->getId()));
        }

        return $this->render('propfeatureamen/new.html.twig', array(
            'propFeatureAman' => $propFeatureAman,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropFeatureAmen entity.
     *
     */
    public function showAction(PropFeatureAmen $propFeatureAman)
    {
        $deleteForm = $this->createDeleteForm($propFeatureAman);

        return $this->render('propfeatureamen/show.html.twig', array(
            'propFeatureAman' => $propFeatureAman,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropFeatureAmen entity.
     *
     */
    public function editAction(Request $request, PropFeatureAmen $propFeatureAman)
    {
        $deleteForm = $this->createDeleteForm($propFeatureAman);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PropFeatureAmenType', $propFeatureAman);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propFeatureAman);
            $em->flush();

            return $this->redirectToRoute('propfeatureamen_edit', array('id' => $propFeatureAman->getId()));
        }

        return $this->render('propfeatureamen/edit.html.twig', array(
            'propFeatureAman' => $propFeatureAman,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropFeatureAmen entity.
     *
     */
    public function deleteAction(Request $request, PropFeatureAmen $propFeatureAman)
    {
        $form = $this->createDeleteForm($propFeatureAman);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propFeatureAman);
            $em->flush();
        }

        return $this->redirectToRoute('propfeatureamen_index');
    }

    /**
     * Creates a form to delete a PropFeatureAmen entity.
     *
     * @param PropFeatureAmen $propFeatureAman The PropFeatureAmen entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropFeatureAmen $propFeatureAman)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propfeatureamen_delete', array('id' => $propFeatureAman->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
