<?php

namespace Blog\ArticlesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction()
    {
        return $this->render('BlogUserBundle:Default:index.html.twig');
    }
}

?>