<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\furnished;
use Brooter\AdminBundle\Form\furnishedType;

/**
 * furnished controller.
 *
 */
class furnishedController extends Controller
{
    /**
     * Lists all furnished entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $furnisheds = $em->getRepository('BrooterAdminBundle:furnished')->findAll();

        return $this->render('furnished/index.html.twig', array(
            'furnisheds' => $furnisheds,
        ));
    }

    /**
     * Creates a new furnished entity.
     *
     */
    public function newAction(Request $request)
    {
        $furnished = new furnished();
        $form = $this->createForm('Brooter\AdminBundle\Form\furnishedType', $furnished);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($furnished);
            $em->flush();

            return $this->redirectToRoute('furnished_show', array('id' => $furnished->getId()));
        }

        return $this->render('furnished/new.html.twig', array(
            'furnished' => $furnished,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a furnished entity.
     *
     */
    public function showAction(furnished $furnished)
    {
        $deleteForm = $this->createDeleteForm($furnished);

        return $this->render('furnished/show.html.twig', array(
            'furnished' => $furnished,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing furnished entity.
     *
     */
    public function editAction(Request $request, furnished $furnished)
    {
        $deleteForm = $this->createDeleteForm($furnished);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\furnishedType', $furnished);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($furnished);
            $em->flush();

            return $this->redirectToRoute('furnished_edit', array('id' => $furnished->getId()));
        }

        return $this->render('furnished/edit.html.twig', array(
            'furnished' => $furnished,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a furnished entity.
     *
     */
    public function deleteAction(Request $request, furnished $furnished)
    {
        $form = $this->createDeleteForm($furnished);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($furnished);
            $em->flush();
        }

        return $this->redirectToRoute('furnished_index');
    }

    /**
     * Creates a form to delete a furnished entity.
     *
     * @param furnished $furnished The furnished entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(furnished $furnished)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('furnished_delete', array('id' => $furnished->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
