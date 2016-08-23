<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\MaterialUsed;
use Brooter\AdminBundle\Form\MaterialUsedType;

/**
 * MaterialUsed controller.
 *
 */
class MaterialUsedController extends Controller
{
    /**
     * Lists all MaterialUsed entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $materialUseds = $em->getRepository('BrooterAdminBundle:MaterialUsed')->findAll();

        return $this->render('materialused/index.html.twig', array(
            'materialUseds' => $materialUseds,
        ));
    }

    /**
     * Creates a new MaterialUsed entity.
     *
     */
    public function newAction(Request $request)
    {
        $materialUsed = new MaterialUsed();
        $form = $this->createForm('Brooter\AdminBundle\Form\MaterialUsedType', $materialUsed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($materialUsed);
            $em->flush();

            return $this->redirectToRoute('materialused_show', array('id' => $materialUsed->getId()));
        }

        return $this->render('materialused/new.html.twig', array(
            'materialUsed' => $materialUsed,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MaterialUsed entity.
     *
     */
    public function showAction(MaterialUsed $materialUsed)
    {
        $deleteForm = $this->createDeleteForm($materialUsed);

        return $this->render('materialused/show.html.twig', array(
            'materialUsed' => $materialUsed,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MaterialUsed entity.
     *
     */
    public function editAction(Request $request, MaterialUsed $materialUsed)
    {
        $deleteForm = $this->createDeleteForm($materialUsed);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\MaterialUsedType', $materialUsed);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($materialUsed);
            $em->flush();

            return $this->redirectToRoute('materialused_edit', array('id' => $materialUsed->getId()));
        }

        return $this->render('materialused/edit.html.twig', array(
            'materialUsed' => $materialUsed,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MaterialUsed entity.
     *
     */
    public function deleteAction(Request $request, MaterialUsed $materialUsed)
    {
        $form = $this->createDeleteForm($materialUsed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($materialUsed);
            $em->flush();
        }

        return $this->redirectToRoute('materialused_index');
    }

    /**
     * Creates a form to delete a MaterialUsed entity.
     *
     * @param MaterialUsed $materialUsed The MaterialUsed entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MaterialUsed $materialUsed)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materialused_delete', array('id' => $materialUsed->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
