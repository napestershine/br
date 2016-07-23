<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PropertyCate;
use Brooter\AdminBundle\Form\PropertyCateType;

/**
 * PropertyCate controller.
 *
 */
class PropertyCateController extends Controller
{
    /**
     * Lists all PropertyCate entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propertyCates = $em->getRepository('BrooterAdminBundle:PropertyCate')->findAll();

        return $this->render('propertycate/index.html.twig', array(
            'propertyCates' => $propertyCates,
        ));
    }

    /**
     * Creates a new PropertyCate entity.
     *
     */
    public function newAction(Request $request)
    {
        $propertyCate = new PropertyCate();
        $form = $this->createForm('Brooter\AdminBundle\Form\PropertyCateType', $propertyCate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyCate);
            $em->flush();

            return $this->redirectToRoute('propertycate_show', array('id' => $propertyCate->getId()));
        }

        return $this->render('propertycate/new.html.twig', array(
            'propertyCate' => $propertyCate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropertyCate entity.
     *
     */
    public function showAction(PropertyCate $propertyCate)
    {
        $deleteForm = $this->createDeleteForm($propertyCate);

        return $this->render('propertycate/show.html.twig', array(
            'propertyCate' => $propertyCate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropertyCate entity.
     *
     */
    public function editAction(Request $request, PropertyCate $propertyCate)
    {
        $deleteForm = $this->createDeleteForm($propertyCate);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PropertyCateType', $propertyCate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyCate);
            $em->flush();

            return $this->redirectToRoute('propertycate_edit', array('id' => $propertyCate->getId()));
        }

        return $this->render('propertycate/edit.html.twig', array(
            'propertyCate' => $propertyCate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropertyCate entity.
     *
     */
    public function deleteAction(Request $request, PropertyCate $propertyCate)
    {
        $form = $this->createDeleteForm($propertyCate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propertyCate);
            $em->flush();
        }

        return $this->redirectToRoute('propertycate_index');
    }

    /**
     * Creates a form to delete a PropertyCate entity.
     *
     * @param PropertyCate $propertyCate The PropertyCate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropertyCate $propertyCate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propertycate_delete', array('id' => $propertyCate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
