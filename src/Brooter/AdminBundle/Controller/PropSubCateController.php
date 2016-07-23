<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PropSubCate;
use Brooter\AdminBundle\Form\PropSubCateType;

/**
 * PropSubCate controller.
 *
 */
class PropSubCateController extends Controller
{
    /**
     * Lists all PropSubCate entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propSubCates = $em->getRepository('BrooterAdminBundle:PropSubCate')->findAll();

        return $this->render('propsubcate/index.html.twig', array(
            'propSubCates' => $propSubCates,
        ));
    }

    /**
     * Creates a new PropSubCate entity.
     *
     */
    public function newAction(Request $request)
    {
        $propSubCate = new PropSubCate();
        $form = $this->createForm('Brooter\AdminBundle\Form\PropSubCateType', $propSubCate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propSubCate);
            $em->flush();

            return $this->redirectToRoute('propsubcate_show', array('id' => $propSubCate->getId()));
        }

        return $this->render('propsubcate/new.html.twig', array(
            'propSubCate' => $propSubCate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PropSubCate entity.
     *
     */
    public function showAction(PropSubCate $propSubCate)
    {
        $deleteForm = $this->createDeleteForm($propSubCate);

        return $this->render('propsubcate/show.html.twig', array(
            'propSubCate' => $propSubCate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PropSubCate entity.
     *
     */
    public function editAction(Request $request, PropSubCate $propSubCate)
    {
        $deleteForm = $this->createDeleteForm($propSubCate);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PropSubCateType', $propSubCate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propSubCate);
            $em->flush();

            return $this->redirectToRoute('propsubcate_edit', array('id' => $propSubCate->getId()));
        }

        return $this->render('propsubcate/edit.html.twig', array(
            'propSubCate' => $propSubCate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PropSubCate entity.
     *
     */
    public function deleteAction(Request $request, PropSubCate $propSubCate)
    {
        $form = $this->createDeleteForm($propSubCate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propSubCate);
            $em->flush();
        }

        return $this->redirectToRoute('propsubcate_index');
    }

    /**
     * Creates a form to delete a PropSubCate entity.
     *
     * @param PropSubCate $propSubCate The PropSubCate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PropSubCate $propSubCate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propsubcate_delete', array('id' => $propSubCate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
