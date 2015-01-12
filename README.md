Esiea - Projet web (PHP/HTML5) - Blog

-------

Sujet : Création d'un système de gestion d'objet et son API (ex : blog, bibliothèque...)

Objectifs conceptuels (50%) :
- Utilisation de Symfony 2
- Utilisation des templates (twig)
- Maîtrise de l'architecture MVC
- Utilisation des modèles de données avec l'ORM Doctrine

Objectifs pratiques (50%) :
- Gestion des objets et des catégories inhérentes : Afficher, Ajouter, Modifier, Supprimer
- API Restful pour opération de base sur ces objets : GET, POST, UPDATE, DELETE
- Documentation de l'API
- Gestion des utilisateurs à l'aide du module FOSUserBundle
- Mise en forme CSS à l'aide de Bootstrap

-------

GET : Le blog contient 3 articles par défaut, sur l'accueil 
et une gestion des articles.
Il contient un module de connexion (login, inscription, logout).

POST :
1. Pour ajouter un article :
	Il faut être connecter en tant que membre (ROLE_USER) :
		a. Membre créé : morvan ( mot de passe : morvan )
		b. Membre créé : samir ( mot de passe : samir )
		c. Ou création d'un nouveau membre via l'inscription ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/register/ )

2. Ecrire un article ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/article/creation )
	a. Cliquer sur écrire un article.
	b. Remplir le formulaire ( titre, contenu ) et valider.
	c. L'article sera généré sur l'accueil du blog.

UPDATE :
3. Modification de l'article ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/article/modifier/8 )
	a. Cliquer sur modifier en dessous de l'article correspondant.
	b. Entrer les données à modifier dans le formulaire et valider.
	c. L'article affiché en page d'accueil sera modifié à cette suite.

DELETE :
4. Suppression de l'article ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/article/supprimer/8 )
	a. Cliquer sur supprimer en dessous de l'article correspondant.