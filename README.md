
# Projet de Timeline de Posts

## Description

Ce projet est une application de réseau social simple permettant aux utilisateurs de publier des messages, de les liker et de supprimer leurs propres posts. Il utilise Laravel pour le backend et Blade pour les vues. Les fonctionnalités incluent la création, la visualisation, le liking et la suppression de posts.

## Fonctionnalités

- **Authentification des utilisateurs** : Inscription et connexion sécurisées avec Laravel Breeze.
- **Création de posts** : Les utilisateurs peuvent créer des posts.
- **Affichage des posts** : Les posts sont affichés dans l'ordre chronologique, les plus récents en haut.
- **Like / Unlike** : Les utilisateurs peuvent aimer ou ne plus aimer les posts.
- **Suppression de posts** : Les utilisateurs peuvent supprimer uniquement leurs propres posts.

## Technologies Utilisées

- **Backend** : Laravel 8
- **Frontend** : Blade, TailwindCSS, @csrf
- **Base de données** : MySQL

## Installation

### Prérequis

- PHP 8
- Composer
- MySQL

### Installation des Dépendances

1. Clonez le dépôt :

   ```bash
   git clone "https://github.com/Mohammed-ela/laravel-timeline"
   ```

2. Accédez au répertoire du projet :

   ```bash
   cd le dossier
   ```

3. Installez les dépendances via Composer :

   ```bash
   composer install
   ```

4. Copiez le fichier de configuration `.env.example` en `.env` :

   ```bash
   cp .env.example .env
   ```

5. Configurez votre base de données dans le fichier `.env` :

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nom_de_votre_base_de_donnees
   DB_USERNAME=nom_utilisateur
   DB_PASSWORD=mot_de_passe
   ```

6. Exécutez les migrations pour créer la base de données :

   ```bash
   php artisan migrate
   ```

7. Démarrez le serveur de développement :

   ```bash
   php artisan serve
   ```

### Accès à l'application

- Ouvrez votre navigateur et accédez à [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Utilisation

- **Inscription** : Accédez à la page d'inscription pour créer un compte.
- **Connexion** : Connectez-vous avec vos identifiants.
- **Création de Post** : Utilisez le bouton "Add Post" pour créer un nouveau post.
- **Like / Unlike** : Cliquez sur les boutons "Like" ou "Unlike" pour interagir avec les posts.
- **Suppression de Post** : Cliquez sur "Delete" pour supprimer vos posts.


## License

Ce projet est sous licence MIT. Consultez le fichier [LICENSE](MIT) pour plus de détails.

## Auteur

- **Votre Nom** - [Votre Profil GitHub](https://github.com/Mohammed-ela/)
