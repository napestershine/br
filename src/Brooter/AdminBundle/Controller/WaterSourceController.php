<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\WaterSource;
use Brooter\AdminBundle\Form\WaterSourceType;

/**
 * WaterSource controller.
 *
 */
class WaterSourceController extends Controller
{
    /**
     * Lists all WaterSource entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $waterSources = $em->getRepository('BrooterAdminBundle:WaterSource')->findAll();

        return $this->render('watersource/index.html.twig', array(
            'waterSources' => $waterSources,
        ));
    }

    /**
     * Creates a new WaterSource entity.
     *
     */
    public function newAction(Request $request)
    {
        $waterSource = new WaterSource();
        $form = $this->createForm('Brooter\AdminBundle\Form\WaterSourceType', $waterSource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($waterSource);
            $em->flush();

            return $this->redirectToRoute('watersource_show', array('id' => $waterSource->getId()));
        }

        return $this->render('watersource/new.html.twig', array(
            'waterSource' => $waterSource,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a WaterSource entity.
     *
     */
    public function showAction(WaterSource $waterSource)
    {
        $deleteForm = $this->createDeleteForm($waterSource);

        return $this->render('watersource/show.html.twig', array(
            'waterSource' => $waterSource,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing WaterSource entity.
     *
     */
    public function editAction(Request $request, WaterSource $waterSource)
    {
        $deleteForm = $this->createDeleteForm($waterSource);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\WaterSourceType', $waterSource);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($waterSource);
            $em->flush();

            return $this->redirectToRoute('watersource_edit', array('id' => $waterSource->getId()));
        }

        return $this->render('watersource/edit.html.twig', array(
            'waterSource' => $waterSource,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a WaterSource entity.
     *
     */
    public function deleteAction(Request $request, WaterSource $waterSource)
    {
        $form = $this->createDeleteForm($waterSource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($waterSource);
            $em->flush();
        }

        return $this->redirectToRoute('watersource_index');
    }

    /**
     * Creates a form to delete a WaterSource entity.
     *
     * @param WaterSource $waterSource The WaterSource entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(WaterSource $waterSource)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('watersource_delete', array('id' => $waterSource->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
