<?php

namespace Brooter\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrooterBlogBundle:Default:index.html.twig');
    }
}
