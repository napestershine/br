<?php

namespace Brooter\PropertyBundle\Controller;

use Brooter\PropertyBundle\Entity\FloorPlans;
use Brooter\PropertyBundle\Entity\YearBuilt;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brooter\PropertyBundle\Entity\PostProperty;
use Brooter\PropertyBundle\Form\PostPropertyType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;

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
    public function indexAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();

        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        $postProperties = $em->getRepository('BrooterPropertyBundle:PostProperty')->findAll();

        

        $dql   = "SELECT a FROM BrooterPropertyBundle:PostProperty a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            2/*limit per page*/
        );
        return $this->render('postproperty/index.html.twig', array(
            'postProperties' => $postProperties,
            'company' => $company,
            'pagination' => $pagination

        ));
    }


    public function fillYears()
    {
        $yearBuiltEM = $this->getDoctrine()->getManager()->getRepository('BrooterPropertyBundle:YearBuilt');
        if (!($yearBuiltEM->findAll())) {
            $j = 20;
            $k = 0;
            $l = 0;
            for ($i = 20; ; $i--) {

                if ($i == 45) {
                    break;
                }
                if ($i < 0) {
                    $i = 99;
                    $j--;
                }
                if ($i != 0) {
                    $k = $i;
                    $l = $k - 1;


                    if (strlen($k) < 2) {

                        $k = '0' . $k;
                    }

                    if (strlen($l) < 2) {

                        $l = '0' . $l;
                    }
                    $years = $j . $k . '-' . $l;
                } elseif ($i == 0) {
                    $years = "2000-99";
                }

                $yearbuilt = new YearBuilt();
                $yearbuilt->setYearOfBuilding($years);
                $em = $this->getDoctrine()->getManager();
                $em->persist($yearbuilt);
                $em->flush();

            }

        }

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

        $this->fillYears();
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        if ($form->isSubmitted() && $form->isValid()) {

            $files = $postProperty->getPropertyImage();
            foreach ($files as $f) {
                $filename = $this->get('brooter.property.prop_post_uploader')->upload($f->getFilePath());
                $f->setFilePath($filename);


            }

            $floorplansfiles = $postProperty->getFloorPlans();
            foreach ($floorplansfiles as $p) {
                $fname = $this->get('brooter.property.floor_plan_uploader')->upload($p->getImageFilePath());
                $p->setImageFilePath($fname);
            }
//
//            echo "<pre>";
//            var_dump($postProperty);
//            echo "</pre>";
//            die;
            $em = $this->getDoctrine()->getManager();

            $em->persist($postProperty);
            $em->flush();


            return $this->redirectToRoute('postproperty_show', array('id' => $postProperty->getId()));
        }

        return $this->render('postproperty/new.html.twig', array(
            'postProperty' => $postProperty,
            'form' => $form->createView(),
            'company' => $company,

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
            ->getForm();
    }


    public function filterPropertySubCateAction($id)
    {


        $repository = $this->getDoctrine()->getRepository('BrooterAdminBundle:PropSubCate');

        $query = $repository->createQueryBuilder('p')
            ->select('p.id', 'p.propSubCateName')
            ->where('p.propertyCategory = :id')
            ->setParameter('id', $id)
            ->getQuery();

        $subCategories = $query->getResult(); //

        $response = new Response(json_encode($subCategories));

        return $response;
    }

}
