<?php

namespace Brooter\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();





        $dql   = "SELECT a FROM BrooterAdminBundle:Post a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        $categories = $em->getRepository('BrooterAdminBundle:Category')->findAll();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);

        return $this->render('BrooterBlogBundle:Default:index.html.twig', array(
            'company' => $company,
            'categories' => $categories,
            'pagination' => $pagination,
        ));
    }

    public function showAction($id)
    {
        //$deleteForm = $this->createDeleteForm($post);
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);
        $post = $em->getRepository('BrooterAdminBundle:Post')->find($id);
        $categories = $em->getRepository('BrooterAdminBundle:Category')->findAll();
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);

        return $this->render('BrooterBlogBundle:Default:show.html.twig', array(
            'post' => $post, 'category' => $company,
            'categories' => $categories, 'company' => $company,
            //'delete_form' => $deleteForm->createView(),
        ));
    }
}
