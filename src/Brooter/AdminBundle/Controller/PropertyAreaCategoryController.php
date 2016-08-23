<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PropertyAreaCategory;
use Brooter\AdminBundle\Form\PropertyAreaCategoryType;

/**
 * PropertyAreaCategory controller.
 *
 */
class PropertyAreaCategoryController extends Controller
{
    /**
     * Lists all PropertyAreaCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propertyAreaCategories = $em->getRepository('BrooterAdminBundle:PropertyAreaCategory')->findAll();

        return $this->render('propertyareacategory/index.html.twig', array(
            'propertyAreaCategories' => $propertyAreaCategories,
        ));
    }

    /**
     * Creates a new PropertyAreaCategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $propertyAreaCategory = new PropertyAreaCategory();
        $form = $this->createForm('Brooter\AdminBundle\Form\PropertyAreaCategoryType', $propertyAreaCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyAreaCategory);
            $em->flush();

            return $this->redirectToRoute('propertyareacategory_show', array('id' => $propertyAreaCategory->getId()));
        }

        return $this->render('propertyareacategory/new.html.twig', array(
            'propertyAreaCategory' => $propertyAreaCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropertyAreaCategory entity.
     *
     */
    public function showAction(PropertyAreaCategory $propertyAreaCategory)
    {
        $deleteForm = $this->createDeleteForm($propertyAreaCategory);

        return $this->render('propertyareacategory/show.html.twig', array(
            'propertyAreaCategory' => $propertyAreaCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropertyAreaCategory entity.
     *
     */
    public function editAction(Request $request, PropertyAreaCategory $propertyAreaCategory)
    {
        $deleteForm = $this->createDeleteForm($propertyAreaCategory);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PropertyAreaCategoryType', $propertyAreaCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyAreaCategory);
            $em->flush();

            return $this->redirectToRoute('propertyareacategory_edit', array('id' => $propertyAreaCategory->getId()));
        }

        return $this->render('propertyareacategory/edit.html.twig', array(
            'propertyAreaCategory' => $propertyAreaCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropertyAreaCategory entity.
     *
     */
    public function deleteAction(Request $request, PropertyAreaCategory $propertyAreaCategory)
    {
        $form = $this->createDeleteForm($propertyAreaCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propertyAreaCategory);
            $em->flush();
        }

        return $this->redirectToRoute('propertyareacategory_index');
    }

    /**
     * Creates a form to delete a PropertyAreaCategory entity.
     *
     * @param PropertyAreaCategory $propertyAreaCategory The PropertyAreaCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropertyAreaCategory $propertyAreaCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propertyareacategory_delete', array('id' => $propertyAreaCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
