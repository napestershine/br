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
        $company = $em->getRepository('BrooterAdminBundle:Company')->findOneById(1);

        return $this->render('BrooterBlogBundle:Default:index.html.twig', array(
            'posts' => $posts, 'company' => $company,
            'categories' => $categories,
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
