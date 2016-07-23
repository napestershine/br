<?php

namespace Brooter\PropertyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\PropertyBundle\Entity\FloorPlans;
use Brooter\PropertyBundle\Form\FloorPlansType;

/**
 * FloorPlans controller.
 *
 */
class FloorPlansController extends Controller
{
    /**
     * Lists all FloorPlans entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $floorPlans = $em->getRepository('BrooterPropertyBundle:FloorPlans')->findAll();

        return $this->render('floorplans/index.html.twig', array(
            'floorPlans' => $floorPlans,
        ));
    }

    /**
     * Creates a new FloorPlans entity.
     *
     */
    public function newAction(Request $request)
    {
        $floorPlan = new FloorPlans();
        $form = $this->createForm('Brooter\PropertyBundle\Form\FloorPlansType', $floorPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($floorPlan);
            $em->flush();

            return $this->redirectToRoute('floorplans_show', array('id' => $floorPlan->getId()));
        }

        return $this->render('floorplans/new.html.twig', array(
            'floorPlan' => $floorPlan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FloorPlans entity.
     *
     */
    public function showAction(FloorPlans $floorPlan)
    {
        $deleteForm = $this->createDeleteForm($floorPlan);

        return $this->render('floorplans/show.html.twig', array(
            'floorPlan' => $floorPlan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FloorPlans entity.
     *
     */
    public function editAction(Request $request, FloorPlans $floorPlan)
    {
        $deleteForm = $this->createDeleteForm($floorPlan);
        $editForm = $this->createForm('Brooter\PropertyBundle\Form\FloorPlansType', $floorPlan);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($floorPlan);
            $em->flush();

            return $this->redirectToRoute('floorplans_edit', array('id' => $floorPlan->getId()));
        }

        return $this->render('floorplans/edit.html.twig', array(
            'floorPlan' => $floorPlan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FloorPlans entity.
     *
     */
    public function deleteAction(Request $request, FloorPlans $floorPlan)
    {
        $form = $this->createDeleteForm($floorPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($floorPlan);
            $em->flush();
        }

        return $this->redirectToRoute('floorplans_index');
    }

    /**
     * Creates a form to delete a FloorPlans entity.
     *
     * @param FloorPlans $floorPlan The FloorPlans entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FloorPlans $floorPlan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('floorplans_delete', array('id' => $floorPlan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
