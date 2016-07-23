<?php

namespace Brooter\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('BrooterAdminBundle:Post')->findAll();
        $categories = $em->getRepository('BrooterAdminBundle:Category')->findAll();

        return $this->render('BrooterBlogBundle:Default:index.html.twig', array(
            'posts' => $posts,
            'categories' => $categories,
        ));
    }

    public function showAction($id)
    {
        //$deleteForm = $this->createDeleteForm($post);
        $em = $this->getDoctrine()->getManager();


        $post = $em->getRepository('BrooterAdminBundle:Post')->find($id);
        $categories = $em->getRepository('BrooterAdminBundle:Category')->findAll();
        return $this->render('BrooterBlogBundle:Default:show.html.twig', array(
            'post' => $post,
            'categories' => $categories,
            //'delete_form' => $deleteForm->createView(),
        ));
    }
}
