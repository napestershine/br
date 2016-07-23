<?php

namespace Brooter\PropertyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\PropertyBundle\Entity\YearBuilt;
use Brooter\PropertyBundle\Form\YearBuiltType;

/**
 * YearBuilt controller.
 *
 */
class YearBuiltController extends Controller
{
    /**
     * Lists all YearBuilt entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $yearBuilts = $em->getRepository('BrooterPropertyBundle:YearBuilt')->findAll();

        return $this->render('yearbuilt/index.html.twig', array(
            'yearBuilts' => $yearBuilts,
        ));
    }

    /**
     * Creates a new YearBuilt entity.
     *
     */
    public function newAction(Request $request)
    {
        $yearBuilt = new YearBuilt();
        $form = $this->createForm('Brooter\PropertyBundle\Form\YearBuiltType', $yearBuilt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($yearBuilt);
            $em->flush();

            return $this->redirectToRoute('yearbuilt_show', array('id' => $yearBuilt->getId()));
        }

        return $this->render('yearbuilt/new.html.twig', array(
            'yearBuilt' => $yearBuilt,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a YearBuilt entity.
     *
     */
    public function showAction(YearBuilt $yearBuilt)
    {
        $deleteForm = $this->createDeleteForm($yearBuilt);

        return $this->render('yearbuilt/show.html.twig', array(
            'yearBuilt' => $yearBuilt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing YearBuilt entity.
     *
     */
    public function editAction(Request $request, YearBuilt $yearBuilt)
    {
        $deleteForm = $this->createDeleteForm($yearBuilt);
        $editForm = $this->createForm('Brooter\PropertyBundle\Form\YearBuiltType', $yearBuilt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($yearBuilt);
            $em->flush();

            return $this->redirectToRoute('yearbuilt_edit', array('id' => $yearBuilt->getId()));
        }

        return $this->render('yearbuilt/edit.html.twig', array(
            'yearBuilt' => $yearBuilt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a YearBuilt entity.
     *
     */
    public function deleteAction(Request $request, YearBuilt $yearBuilt)
    {
        $form = $this->createDeleteForm($yearBuilt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($yearBuilt);
            $em->flush();
        }

        return $this->redirectToRoute('yearbuilt_index');
    }

    /**
     * Creates a form to delete a YearBuilt entity.
     *
     * @param YearBuilt $yearBuilt The YearBuilt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(YearBuilt $yearBuilt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('yearbuilt_delete', array('id' => $yearBuilt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
