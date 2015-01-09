<?php

namespace Blog\HomepageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class Homepage2Controller extends Controller {

    /**
     *  Fonction gérant la page d'accueil et les articles ( ainsi que la fenêtre flottante de connexion située dans la nav-bar )
     *  J'ai réutilisé du code de FOSUser du fichier SecurityController en ayant intégré les 'use' nécessaires.
     */
    public function affichageAction(Request $request)
    {
        /** 
         *  Provient de -> FOSUserBundle/Controller/SecurityController.php 
         */
        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        $csrfToken = $this->has('form.csrf_provider')
            ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        $fosuser_var = array('last_username' => $lastUsername, 'error' => $error, 'csrf_token' => $csrfToken);
        // --------------------------------------------------------------------------------------------------------

        // Récupération des articles de la BDD
        $manager = $this->getDoctrine()->getManager();
        $articles = $manager->getRepository("BlogArticlesBundle:Article")->findAll();
        $users = $manager->getRepository("BlogUserBundle:User")->findAll();

        // Envoi du template des articles en tant que membre
        return $this->render('BlogHomepageBundle:Homepage:homepage2.html.twig', array('articles' => $articles, 'fosuser_var' => $fosuser_var, 'users' => $users));
        //return $this->render('BlogHomepageBundle:Homepage:homepage2.html.twig');
    }

    /**
     *   Modification via XMLHttpRequest
     */
    public function likeAction() {
        $message = "erreur";

        if(isset($_GET['id']) && isset($_GET['type']) && $this->getUser() != "") {
            $id = $_GET['id'];

            $manager = $this->getDoctrine()->getManager();
            $article = $manager->getRepository("BlogArticlesBundle:Article")->find($id);
            $like = $manager->getRepository("BlogLikeBundle:Likes")->find($id);
            $idArticle = $like->getIdArticleByUser($this->getUser());

            // Like 
            if($_GET['type'] == "yes") {
                $nombre = $article->getNombreLikes() + 1;
                $article->setNombreLikes($nombre);

                $query = $manager->createQuery(
                    'INSERT INTO id_user, id_article
                    FROM BlogLikeBundle:Likes p
                    WHERE p.price > :price
                    '
                )->setParameter('price', '19.99');

                $likes = $query->getResult();

                //$article->setIsLiked("yes");
                //$article->setDateLike(new \DateTime());
            }
            // dislike
            else {
                $nombre = 0;
                if($article->getNombreLikes() > 0) {
                    $nombre = $article->getNombreLikes() - 1;
                }
                $article->setNombreLikes($nombre);
                //$article->setIsLiked("no");
            }

            // Préparation requête doctrine
            $manager->persist($article);
            // Envoi en bdd
            $manager->flush();

            $message = $article->getNombreLikes() + " ont aimé !";
        }

        return new Response($message);
    }
}