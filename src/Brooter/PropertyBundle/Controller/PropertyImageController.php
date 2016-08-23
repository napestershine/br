<?php

namespace Brooter\PropertyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\PropertyBundle\Entity\PropertyImage;
use Brooter\PropertyBundle\Form\PropertyImageType;

/**
 * PropertyImage controller.
 *
 */
class PropertyImageController extends Controller
{
    /**
     * Lists all PropertyImage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propertyImages = $em->getRepository('BrooterPropertyBundle:PropertyImage')->findAll();

        return $this->render('propertyimage/index.html.twig', array(
            'propertyImages' => $propertyImages,
        ));
    }

    /**
     * Creates a new PropertyImage entity.
     *
     */
    public function newAction(Request $request)
    {
        $propertyImage = new PropertyImage();
        $form = $this->createForm('Brooter\PropertyBundle\Form\PropertyImageType', $propertyImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyImage);
            $em->flush();

            return $this->redirectToRoute('propertyimage_show', array('id' => $propertyImage->getId()));
        }

        return $this->render('propertyimage/new.html.twig', array(
            'propertyImage' => $propertyImage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropertyImage entity.
     *
     */
    public function showAction(PropertyImage $propertyImage)
    {
        $deleteForm = $this->createDeleteForm($propertyImage);

        return $this->render('propertyimage/show.html.twig', array(
            'propertyImage' => $propertyImage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropertyImage entity.
     *
     */
    public function editAction(Request $request, PropertyImage $propertyImage)
    {
        $deleteForm = $this->createDeleteForm($propertyImage);
        $editForm = $this->createForm('Brooter\PropertyBundle\Form\PropertyImageType', $propertyImage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propertyImage);
            $em->flush();

            return $this->redirectToRoute('propertyimage_edit', array('id' => $propertyImage->getId()));
        }

        return $this->render('propertyimage/edit.html.twig', array(
            'propertyImage' => $propertyImage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropertyImage entity.
     *
     */
    public function deleteAction(Request $request, PropertyImage $propertyImage)
    {
        $form = $this->createDeleteForm($propertyImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propertyImage);
            $em->flush();
        }

        return $this->redirectToRoute('propertyimage_index');
    }

    /**
     * Creates a form to delete a PropertyImage entity.
     *
     * @param PropertyImage $propertyImage The PropertyImage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropertyImage $propertyImage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propertyimage_delete', array('id' => $propertyImage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
