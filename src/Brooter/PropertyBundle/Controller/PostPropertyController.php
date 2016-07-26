<?php

namespace Brooter\PropertyBundle\Controller;

use Brooter\PropertyBundle\Entity\YearBuilt;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\PropertyBundle\Entity\PostProperty;
use Brooter\PropertyBundle\Form\PostPropertyType;

/**
 * PostProperty controller.
 *
 */
class PostPropertyController extends Controller
{
    /**
     * Lists all PostProperty entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $postProperties = $em->getRepository('BrooterPropertyBundle:PostProperty')->findAll();

        return $this->render('postproperty/index.html.twig', array(
            'postProperties' => $postProperties,
        ));
    }

    /**
     * Creates a new PostProperty entity.
     *
     */
    public function newAction(Request $request)
    {
        $postProperty = new PostProperty();
        $form = $this->createForm('Brooter\PropertyBundle\Form\PostPropertyType', $postProperty);
        $form->handleRequest($request);

        $yearBuiltEM = $this->getDoctrine()->getManager()->getRepository('BrooterPropertyBundle:YearBuilt');



        if(!($yearBuiltEM->findAll()))
        {
            $j=20;
            $k=0;
            $l=0;
            for($i=20;;$i--)
            {

                if($i==45)
                {
                    break;
                }
                if($i<0)
                {
                    $i=99;
                    $j--;
                }
                if($i!=0)
                {
                    $k=$i;
                    $l=$k-1;


                    if(strlen($k)<2)
                    {

                        $k='0'.$k;
                    }

                    if(strlen($l)<2)
                    {

                        $l='0'.$l;
                    }
                    $years=$j.$k.'-'.$l;
                }
                elseif($i==0)
                {
                    $years="2000-99";
                }

                $yearbuilt=new YearBuilt();
                $yearbuilt->setYearOfBuilding($years);
                $em = $this->getDoctrine()->getManager();
                $em->persist($yearbuilt);
                $em->flush();

            }

        }


        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

           

            $em->persist($postProperty);
            $em->flush();


            return $this->redirectToRoute('postproperty_show', array('id' => $postProperty->getId()));
        }

        return $this->render('postproperty/new.html.twig', array(
            'postProperty' => $postProperty,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PostProperty entity.
     *
     */
    public function showAction(PostProperty $postProperty)
    {
        $deleteForm = $this->createDeleteForm($postProperty);

        return $this->render('postproperty/show.html.twig', array(
            'postProperty' => $postProperty,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PostProperty entity.
     *
     */
    public function editAction(Request $request, PostProperty $postProperty)
    {
        $deleteForm = $this->createDeleteForm($postProperty);
        $editForm = $this->createForm('Brooter\PropertyBundle\Form\PostPropertyType', $postProperty);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($postProperty);
            $em->flush();

            return $this->redirectToRoute('postproperty_edit', array('id' => $postProperty->getId()));
        }

        return $this->render('postproperty/edit.html.twig', array(
            'postProperty' => $postProperty,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PostProperty entity.
     *
     */
    public function deleteAction(Request $request, PostProperty $postProperty)
    {
        $form = $this->createDeleteForm($postProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($postProperty);
            $em->flush();
        }

        return $this->redirectToRoute('postproperty_index');
    }

    /**
     * Creates a form to delete a PostProperty entity.
     *
     * @param PostProperty $postProperty The PostProperty entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PostProperty $postProperty)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('postproperty_delete', array('id' => $postProperty->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
