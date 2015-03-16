Esiea - Projet web (PHP/HTML5) - Blog
========================================

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

<b>GET</b> : <br />
Le blog contient 3 articles par défaut, sur l'accueil <br />
et une gestion des articles.<br />
Il contient un module de connexion (login, inscription, logout).<br />

<b>POST </b>: <br />
Pour ajouter un article :<br />
1. Il faut être connecter en tant que membre (ROLE_USER) :<br />
a. Membre créé : morvan ( mot de passe : morvan )<br />
b. Membre créé : samir ( mot de passe : samir )<br />
c. Ou création d'un nouveau membre via l'inscription ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/register/ ) <br />

Deux. Ecrire un article ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/article/creation )<br />
a. Dans le menu, cliquer sur écrire un article.<br />
b. Remplir le formulaire ( titre, contenu ) et valider.<br />
c. L'article sera généré sur l'accueil du blog.<br />

<b>UPDATE </b>:<br />
3. Modification de l'article ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/article/modifier/8 )<br />
a. Sur l'accueil, cliquer sur modifier en dessous de l'article correspondant.<br />
b. Entrer les données à modifier dans le formulaire et valider.<br />
c. L'article affiché en page d'accueil sera modifié à cette suite.<br />

<b>DELETE </b>:<br />
4. Suppression de l'article ( http://localhost/www/web_calmel_maikhaf/web/app_dev.php/article/supprimer/8 )<br />
a. Sur l'accueil, cliquer sur supprimer en dessous de l'article correspondant.
