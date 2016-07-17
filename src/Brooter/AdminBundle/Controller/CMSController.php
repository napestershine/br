<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\CMS;
use Brooter\AdminBundle\Form\CMSType;

/**
 * CMS controller.
 *
 */
class CMSController extends Controller
{
    /**
     * Lists all CMS entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cMSs = $em->getRepository('BrooterAdminBundle:CMS')->findAll();

        return $this->render('cms/index.html.twig', array(
            'cMSs' => $cMSs,
        ));
    }

    /**
     * Creates a new CMS entity.
     *
     */
    public function newAction(Request $request)
    {
        $cM = new CMS();
        $form = $this->createForm('Brooter\AdminBundle\Form\CMSType', $cM);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cM);
            $em->flush();

            return $this->redirectToRoute('cms_show', array('id' => $cM->getId()));
        }

        return $this->render('cms/new.html.twig', array(
            'cM' => $cM,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CMS entity.
     *
     */
    public function showAction(CMS $cM)
    {
        $deleteForm = $this->createDeleteForm($cM);

        return $this->render('cms/show.html.twig', array(
            'cM' => $cM,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CMS entity.
     *
     */
    public function editAction(Request $request, CMS $cM)
    {
        $deleteForm = $this->createDeleteForm($cM);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\CMSType', $cM);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cM);
            $em->flush();

            return $this->redirectToRoute('cms_edit', array('id' => $cM->getId()));
        }

        return $this->render('cms/edit.html.twig', array(
            'cM' => $cM,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CMS entity.
     *
     */
    public function deleteAction(Request $request, CMS $cM)
    {
        $form = $this->createDeleteForm($cM);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cM);
            $em->flush();
        }

        return $this->redirectToRoute('cms_index');
    }

    /**
     * Creates a form to delete a CMS entity.
     *
     * @param CMS $cM The CMS entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CMS $cM)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cms_delete', array('id' => $cM->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
