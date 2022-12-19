# Papy Factice

Réalisé le 19/12/22


![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg) ![forthebadge](https://forthebadge.com/images/badges/built-by-developers.svg)
## Sommaire

1. Description
2. Installation
3  Technologies utilisées
4. Améliorations possibles

## Description
_Papy-Factice_ est un mini projet simulant certaines fonctionnalitées d'un site de recherche de logement pour personnes agés.

Les fonctionnalitées présentes sur ce projet sont :
- Affichage de tous les établissements sur la page d'accueil.
- Possibilité de choisir d'afficher seulement EHPAD ou Résidence Services Seniors.
- Une fiche par établissement disponible via un bouton sur la page d'accueil.
- Un formulaire de contact avec envoie de mail.
- Un outil de recherche avancé.

## Installation

Suivez ces instructions pour installer le projet en local sur votre ordinateur.

### Pré-requis :

1. _PHP 8_
2. Un serveur local (ex : _laragon, wamp/lamp_)
3. Le logiciel de gestionnaire de dépendance : _Composer_



### Déroulement de l'installation :

Dans un premier temps, veuillez récupérer le projet github, grâce à la commande :

``git clone https://github.com/RibJulien/papyfactice ``

Modifier ensuite le dossier de configuration _.env_ en indiquant vos identifiants pour votre base de données local :

``DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7&charset=utf8mb4"``

Pour installer toutes les dépendances du projet :

``composer update``

Créer la base de données du projet :

``php bin/console doctrine:database:create``

Passer les migrations du projet sur votre base de données :

``php bin/console doctrine:migrations:migrate``

Un dossier de fixture a été réalisé pour étoffer la base de données :

``php bin/console doctrine:fixtures:load``

Vous pouvez ensuite allumer votre serveur :

``php bin/console server:run``

Puis vous rendre dans votre navigateur à cette url pour accéder au projet :

``127.0.0.1:8000``

## Technologies utilisées
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) ![MYSQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

## Améliorations possibles

- [ ]  Passer toutes les fiches établissements en slug.
- [ ]  Trier par type sans changement de page, en restant toujours sur la page d'accueil.
- [ ]  
