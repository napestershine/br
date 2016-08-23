<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\AreaIn;
use Brooter\AdminBundle\Form\AreaInType;

/**
 * AreaIn controller.
 *
 */
class AreaInController extends Controller
{
    /**
     * Lists all AreaIn entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $areaIns = $em->getRepository('BrooterAdminBundle:AreaIn')->findAll();

        return $this->render('areain/index.html.twig', array(
            'areaIns' => $areaIns,
        ));
    }

    /**
     * Creates a new AreaIn entity.
     *
     */
    public function newAction(Request $request)
    {
        $areaIn = new AreaIn();
        $form = $this->createForm('Brooter\AdminBundle\Form\AreaInType', $areaIn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($areaIn);
            $em->flush();

            return $this->redirectToRoute('areain_show', array('id' => $areaIn->getId()));
        }

        return $this->render('areain/new.html.twig', array(
            'areaIn' => $areaIn,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AreaIn entity.
     *
     */
    public function showAction(AreaIn $areaIn)
    {
        $deleteForm = $this->createDeleteForm($areaIn);

        return $this->render('areain/show.html.twig', array(
            'areaIn' => $areaIn,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AreaIn entity.
     *
     */
    public function editAction(Request $request, AreaIn $areaIn)
    {
        $deleteForm = $this->createDeleteForm($areaIn);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\AreaInType', $areaIn);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($areaIn);
            $em->flush();

            return $this->redirectToRoute('areain_edit', array('id' => $areaIn->getId()));
        }

        return $this->render('areain/edit.html.twig', array(
            'areaIn' => $areaIn,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AreaIn entity.
     *
     */
    public function deleteAction(Request $request, AreaIn $areaIn)
    {
        $form = $this->createDeleteForm($areaIn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($areaIn);
            $em->flush();
        }

        return $this->redirectToRoute('areain_index');
    }

    /**
     * Creates a form to delete a AreaIn entity.
     *
     * @param AreaIn $areaIn The AreaIn entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AreaIn $areaIn)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('areain_delete', array('id' => $areaIn->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
