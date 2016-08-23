<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\ListPropFor;
use Brooter\AdminBundle\Form\ListPropForType;

/**
 * ListPropFor controller.
 *
 */
class ListPropForController extends Controller
{
    /**
     * Lists all ListPropFor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listPropFors = $em->getRepository('BrooterAdminBundle:ListPropFor')->findAll();

        return $this->render('listpropfor/index.html.twig', array(
            'listPropFors' => $listPropFors,
        ));
    }

    /**
     * Creates a new ListPropFor entity.
     *
     */
    public function newAction(Request $request)
    {
        $listPropFor = new ListPropFor();
        $form = $this->createForm('Brooter\AdminBundle\Form\ListPropForType', $listPropFor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listPropFor);
            $em->flush();

            return $this->redirectToRoute('listpropfor_show', array('id' => $listPropFor->getId()));
        }

        return $this->render('listpropfor/new.html.twig', array(
            'listPropFor' => $listPropFor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ListPropFor entity.
     *
     */
    public function showAction(ListPropFor $listPropFor)
    {
        $deleteForm = $this->createDeleteForm($listPropFor);

        return $this->render('listpropfor/show.html.twig', array(
            'listPropFor' => $listPropFor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ListPropFor entity.
     *
     */
    public function editAction(Request $request, ListPropFor $listPropFor)
    {
        $deleteForm = $this->createDeleteForm($listPropFor);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\ListPropForType', $listPropFor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listPropFor);
            $em->flush();

            return $this->redirectToRoute('listpropfor_edit', array('id' => $listPropFor->getId()));
        }

        return $this->render('listpropfor/edit.html.twig', array(
            'listPropFor' => $listPropFor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ListPropFor entity.
     *
     */
    public function deleteAction(Request $request, ListPropFor $listPropFor)
    {
        $form = $this->createDeleteForm($listPropFor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($listPropFor);
            $em->flush();
        }

        return $this->redirectToRoute('listpropfor_index');
    }

    /**
     * Creates a form to delete a ListPropFor entity.
     *
     * @param ListPropFor $listPropFor The ListPropFor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ListPropFor $listPropFor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listpropfor_delete', array('id' => $listPropFor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
