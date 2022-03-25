# Boutique en ligne API

Réalisation d'une boutique en ligne avec panier dynamique.

## Pour commencer

Télécharger le dépôt Git pour initialiser le projet

### Pré-requis

- Node.js
- Composer

### Installation

#### Backend
Créer une base de données et modifier le fichier .env dans pour qu'il pointe vers la base de données.
Lancer la commande ``composer install`` pour installer Symfony et les dépendances.

##### Générer les clés SSH
Suivre les parties 1,2 et 3 du tutorial pour générer une paire de clé SSH pour que l'utilisateur puisse se connecter à l'aide d'un token https://digitalfortress.tech/php/jwt-authentication-with-symfony/

##### Autoriser les CORS
Modifier le fichier .env pour autoriser les requêtes de l'API pour une utilisation en ligne

#### Frontend
Modifier les routes de l'API pour une utilisation en ligne

Lancer la commande ``npm install`` pour installer les modules.

### Démarrage

#### Backend
Lancer la commande ``symfony serve`` pour lancer Symfony.
#### Frontend
Lancer la commande ``npm run serve`` pour lancer Vue.js.

### Technologies utilisées

Symfony version 5
Vue.js version 3

### Aides à la réalisation du projet

Symfony
https://www.udemy.com/share/103IE83@dckHmZC-NAG2NYV9JcHkOZNbXlsf42hjOXsvT16Cg-vksrKCwvuojI23fRrkLf5QHw==/## Versions

Panier
https://www.digitalocean.com/community/tutorials/how-to-build-a-shopping-cart-with-vue-3-and-vuex

Token
https://digitalfortress.tech/php/jwt-authentication-with-symfony/

Authentification
https://www.bezkoder.com/vue-3-authentication-jwt/

Et les documentations des technologies utilisées.