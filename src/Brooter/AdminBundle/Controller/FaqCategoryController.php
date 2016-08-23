<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\FaqCategory;
use Brooter\AdminBundle\Form\FaqCategoryType;

/**
 * FaqCategory controller.
 *
 */
class FaqCategoryController extends Controller
{
    /**
     * Lists all FaqCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $faqCategories = $em->getRepository('BrooterAdminBundle:FaqCategory')->findAll();

        return $this->render('faqcategory/index.html.twig', array(
            'faqCategories' => $faqCategories,
        ));
    }

    /**
     * Creates a new FaqCategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $faqCategory = new FaqCategory();
        $form = $this->createForm('Brooter\AdminBundle\Form\FaqCategoryType', $faqCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($faqCategory);
            $em->flush();

            return $this->redirectToRoute('faqcategory_show', array('id' => $faqCategory->getId()));
        }

        return $this->render('faqcategory/new.html.twig', array(
            'faqCategory' => $faqCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FaqCategory entity.
     *
     */
    public function showAction(FaqCategory $faqCategory)
    {
        $deleteForm = $this->createDeleteForm($faqCategory);

        return $this->render('faqcategory/show.html.twig', array(
            'faqCategory' => $faqCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FaqCategory entity.
     *
     */
    public function editAction(Request $request, FaqCategory $faqCategory)
    {
        $deleteForm = $this->createDeleteForm($faqCategory);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\FaqCategoryType', $faqCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($faqCategory);
            $em->flush();

            return $this->redirectToRoute('faqcategory_edit', array('id' => $faqCategory->getId()));
        }

        return $this->render('faqcategory/edit.html.twig', array(
            'faqCategory' => $faqCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FaqCategory entity.
     *
     */
    public function deleteAction(Request $request, FaqCategory $faqCategory)
    {
        $form = $this->createDeleteForm($faqCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($faqCategory);
            $em->flush();
        }

        return $this->redirectToRoute('faqcategory_index');
    }

    /**
     * Creates a form to delete a FaqCategory entity.
     *
     * @param FaqCategory $faqCategory The FaqCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FaqCategory $faqCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('faqcategory_delete', array('id' => $faqCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
