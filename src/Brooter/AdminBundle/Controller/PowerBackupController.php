<?php

namespace Brooter\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\AdminBundle\Entity\PowerBackup;
use Brooter\AdminBundle\Form\PowerBackupType;

/**
 * PowerBackup controller.
 *
 */
class PowerBackupController extends Controller
{
    /**
     * Lists all PowerBackup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $powerBackups = $em->getRepository('BrooterAdminBundle:PowerBackup')->findAll();

        return $this->render('powerbackup/index.html.twig', array(
            'powerBackups' => $powerBackups,
        ));
    }

    /**
     * Creates a new PowerBackup entity.
     *
     */
    public function newAction(Request $request)
    {
        $powerBackup = new PowerBackup();
        $form = $this->createForm('Brooter\AdminBundle\Form\PowerBackupType', $powerBackup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($powerBackup);
            $em->flush();

            return $this->redirectToRoute('powerbackup_show', array('id' => $powerBackup->getId()));
        }

        return $this->render('powerbackup/new.html.twig', array(
            'powerBackup' => $powerBackup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PowerBackup entity.
     *
     */
    public function showAction(PowerBackup $powerBackup)
    {
        $deleteForm = $this->createDeleteForm($powerBackup);

        return $this->render('powerbackup/show.html.twig', array(
            'powerBackup' => $powerBackup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PowerBackup entity.
     *
     */
    public function editAction(Request $request, PowerBackup $powerBackup)
    {
        $deleteForm = $this->createDeleteForm($powerBackup);
        $editForm = $this->createForm('Brooter\AdminBundle\Form\PowerBackupType', $powerBackup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($powerBackup);
            $em->flush();

            return $this->redirectToRoute('powerbackup_edit', array('id' => $powerBackup->getId()));
        }

        return $this->render('powerbackup/edit.html.twig', array(
            'powerBackup' => $powerBackup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PowerBackup entity.
     *
     */
    public function deleteAction(Request $request, PowerBackup $powerBackup)
    {
        $form = $this->createDeleteForm($powerBackup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($powerBackup);
            $em->flush();
        }

        return $this->redirectToRoute('powerbackup_index');
    }

    /**
     * Creates a form to delete a PowerBackup entity.
     *
     * @param PowerBackup $powerBackup The PowerBackup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PowerBackup $powerBackup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('powerbackup_delete', array('id' => $powerBackup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
