<?php

namespace Blog\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogUserBundle:Default:index.html.twig');
    }
}
