<?php

namespace Blog\LikeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BlogLikeBundle:Default:index.html.twig', array('name' => $name));
    }
}
