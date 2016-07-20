<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PropertyOnFloor;
use Brooter\AdminBundle\Form\PropertyOnFloorType;

/**
 * PropertyOnFloor controller.
 *
 */
class PropertyOnFloorController extends Controller
{
    /**
     * Lists all PropertyOnFloor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propertyOnFloors = $em->getRepository('BrooterAdminBundle:PropertyOnFloor')->findAll();

        return $this->render('propertyonfloor/index.html.twig', array(
            'propertyOnFloors' => $propertyOnFloors,
        ));
    }

    /**
     * Creates a new PropertyOnFloor entity.
     *
     */
    public function newAction(Request $request)
    {
        $propertyOnFloor = new PropertyOnFloor();
        $form = $this->createForm('Brooter\AdminBundle\Form\PropertyOnFloorType', $propertyOnFloor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyOnFloor);
            $em->flush();

            return $this->redirectToRoute('propertyonfloor_show', array('id' => $propertyOnFloor->getId()));
        }

        return $this->render('propertyonfloor/new.html.twig', array(
            'propertyOnFloor' => $propertyOnFloor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropertyOnFloor entity.
     *
     */
    public function showAction(PropertyOnFloor $propertyOnFloor)
    {
        $deleteForm = $this->createDeleteForm($propertyOnFloor);

        return $this->render('propertyonfloor/show.html.twig', array(
            'propertyOnFloor' => $propertyOnFloor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropertyOnFloor entity.
     *
     */
    public function editAction(Request $request, PropertyOnFloor $propertyOnFloor)
    {
        $deleteForm = $this->createDeleteForm($propertyOnFloor);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PropertyOnFloorType', $propertyOnFloor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyOnFloor);
            $em->flush();

            return $this->redirectToRoute('propertyonfloor_edit', array('id' => $propertyOnFloor->getId()));
        }

        return $this->render('propertyonfloor/edit.html.twig', array(
            'propertyOnFloor' => $propertyOnFloor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropertyOnFloor entity.
     *
     */
    public function deleteAction(Request $request, PropertyOnFloor $propertyOnFloor)
    {
        $form = $this->createDeleteForm($propertyOnFloor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propertyOnFloor);
            $em->flush();
        }

        return $this->redirectToRoute('propertyonfloor_index');
    }

    /**
     * Creates a form to delete a PropertyOnFloor entity.
     *
     * @param PropertyOnFloor $propertyOnFloor The PropertyOnFloor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropertyOnFloor $propertyOnFloor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propertyonfloor_delete', array('id' => $propertyOnFloor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
