<?php

// src/Blog/HelloBundle/DataFixtures/ORM/LoadUserData.php

namespace Blog\ArticlesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\ArticlesBundle\Entity\Article;

/**
 *
 */
class ArticleData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Historique de création statique des articles en bdd via doctrine ..
        // Création de(s) objet(s)
        $article1 = new Article();
        $article1->setTitre("Premier billet");
        $article1->setNombreLikes(0);
        $article1->setIsLiked("no");
        $article1->setContent("Contenu du premier billet");
        $article1->setAuteurId("4");

        $article2 = new Article();
        $article2->setTitre("Second billet");
        $article2->setNombreLikes(0);
        $article2->setIsLiked("no");
        $article2->setContent("Contenu du second billet");
        $article2->setAuteurId("4");

        $article3 = new Article();
        $article3->setTitre("Troisième billet");
        $article3->setNombreLikes(0);
        $article3->setIsLiked("no");
        $article3->setContent("Contenu du troisième billet");
        $article3->setAuteurId("4");

        // Préparation
        $manager->persist($article1);
        $manager->persist($article2);
        $manager->persist($article3);

        // Envoi vers la bdd
        $manager->flush();
    }
}

?>