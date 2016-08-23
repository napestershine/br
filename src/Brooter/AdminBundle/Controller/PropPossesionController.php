<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PropPossesion;
use Brooter\AdminBundle\Form\PropPossesionType;

/**
 * PropPossesion controller.
 *
 */
class PropPossesionController extends Controller
{
    /**
     * Lists all PropPossesion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propPossesions = $em->getRepository('BrooterAdminBundle:PropPossesion')->findAll();

        return $this->render('proppossesion/index.html.twig', array(
            'propPossesions' => $propPossesions,
        ));
    }

    /**
     * Creates a new PropPossesion entity.
     *
     */
    public function newAction(Request $request)
    {
        $propPossesion = new PropPossesion();
        $form = $this->createForm('Brooter\AdminBundle\Form\PropPossesionType', $propPossesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propPossesion);
            $em->flush();

            return $this->redirectToRoute('proppossesion_show', array('id' => $propPossesion->getId()));
        }

        return $this->render('proppossesion/new.html.twig', array(
            'propPossesion' => $propPossesion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropPossesion entity.
     *
     */
    public function showAction(PropPossesion $propPossesion)
    {
        $deleteForm = $this->createDeleteForm($propPossesion);

        return $this->render('proppossesion/show.html.twig', array(
            'propPossesion' => $propPossesion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropPossesion entity.
     *
     */
    public function editAction(Request $request, PropPossesion $propPossesion)
    {
        $deleteForm = $this->createDeleteForm($propPossesion);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PropPossesionType', $propPossesion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propPossesion);
            $em->flush();

            return $this->redirectToRoute('proppossesion_edit', array('id' => $propPossesion->getId()));
        }

        return $this->render('proppossesion/edit.html.twig', array(
            'propPossesion' => $propPossesion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropPossesion entity.
     *
     */
    public function deleteAction(Request $request, PropPossesion $propPossesion)
    {
        $form = $this->createDeleteForm($propPossesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propPossesion);
            $em->flush();
        }

        return $this->redirectToRoute('proppossesion_index');
    }

    /**
     * Creates a form to delete a PropPossesion entity.
     *
     * @param PropPossesion $propPossesion The PropPossesion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropPossesion $propPossesion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proppossesion_delete', array('id' => $propPossesion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
