<?php

namespace Blog\ArticlesBundle\Controller;

use Blog\ArticlesBundle\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class ArticleController extends Controller {

	public function initUser(Request $request) 
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
        $users = $manager->getRepository("BlogUserBundle:User")->findAll();

        return array($fosuser_var, $users);
	}

	/**
	 * Création d'un article via formulaire
	 */
    public function creationArticleAction(Request $request)
    {
  		list($fosuser_var, $users) = self::initUser($request);

        return $this->render('BlogArticlesBundle:Articles:creation_article.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
    }

	/**
	 * Ajout de l'article en BDD
	 */
    public function ajoutArticleAction(Request $request)
    {
		list($fosuser_var, $users) = self::initUser($request);

    	if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['auteur'])) {

    		$article = new Article();
		    $article->setTitre($_POST['titre']);
		    $article->setNombreLikes(0);
		    $article->setContent($_POST['contenu']);
		    $article->setIsLiked("no");
		    $article->setAuteur($_POST['auteur']);

		    $manager = $this->getDoctrine()->getManager();
		    $manager->persist($article);
		    $manager->flush();

			// Id du produit créé : 
		    if($article->getId() > 0) {		    	
    			return $this->render('BlogArticlesBundle:Articles:ajout_article.html.twig', array(
    				'titre_article' => $_POST['titre'], 'fosuser_var' => $fosuser_var, 'users' => $users));
			}
			// Echec de creation en BDD de l'article
    		else {
    			return $this->render('BlogArticlesBundle:Articles:echec_article.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
    		}
    	}

        return $this->render('BlogArticlesBundle:Articles:echec_article.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
    }
	
	/**
	 * Modification de l'article via formulaire
     */
    public function modificationArticleAction($idArticle, Request $request)
    {
    	list($fosuser_var, $users) = self::initUser($request);

		// Récupération de l'article de la BDD

        $manager = $this->getDoctrine()->getManager();
        $unArticle = $manager->getRepository("BlogArticlesBundle:Article")->find($idArticle);

		return $this->render('BlogArticlesBundle:Articles:modifier_article.html.twig', array(
			'id_article' => $unArticle->getId(), 
			'titre_article' => $unArticle->getTitre(), 
			'contenu_article' => $unArticle->getContent(),
			'fosuser_var' => $fosuser_var, 'users' => $users));
    }
	
	/**
	 * Envoi des données modifiées
     */
    public function modificationEnvoiArticleAction(Request $request)
    {
		list($fosuser_var, $users) = self::initUser($request);

    	$article = new Article();
    	$manager = $this->getDoctrine()->getManager();
  
  		$article = $manager->getRepository('BlogArticlesBundle:Article')->find($_POST['id']);
    	if (!$article) {
        	throw $this->createNotFoundException('Aucun article trouvé pour cet id : '.$idArticle);
    	}

		if(isset($_POST['titre']) && isset($_POST['contenu'])) {
			$article->setTitre($_POST['titre']);
			$article->setContent($_POST['contenu']);
			$manager->flush();

			return $this->render('BlogArticlesBundle:Articles:modifier_envoi_article.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
		}

		return $this->render('BlogArticlesBundle:Articles:modifier_envoi_echec_article.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
    }

    /**
	 * Suppression de l'article sélectionné
     */
    public function suppressionArticleAction($idArticle, Request $request)
    {
    	list($fosuser_var, $users) = self::initUser($request);

    	$article = new Article();
    	$manager = $this->getDoctrine()->getManager();
  
  		$article = $manager->getRepository('BlogArticlesBundle:Article')->find($idArticle);
    	if (!$article) {
        	return $this->render('BlogArticlesBundle:Articles:erreur.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
    	}

		$manager->remove($article);
		$manager->flush();

		return $this->render('BlogArticlesBundle:Articles:supprimer_article.html.twig', array('fosuser_var' => $fosuser_var, 'users' => $users));
    }
}

?>