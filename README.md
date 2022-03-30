# Boutique en ligne API

Projet de boutique en ligne en séparant la partie backend et la partie frontend. Utilisation de Symfony comme une API et récupération des données côté Vue.js.

## Pour commencer

Télécharger le dépôt Git pour initialiser le projet

### Pré-requis

- Node.js
- Composer

### Installation

#### Backend
Créer une base de données et modifier le fichier .env pour qu'il pointe vers la base de données.
Lancer la commande ``composer install`` pour installer Symfony et les dépendances.

##### Générer les clés SSH

###### Installation de LexikJWTAuthenticationBundle

Pour Symfony 2.x – Symfony 3.3 : 
```php
// Register bundle into app/AppKernel.php:
public function registerBundles()
{
    return array(
        // ...
        new Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle(),
    );
}
```
Pour Symfony 3.4, Symfony 4.x, et au dessus, l'installation du bundle va être automatique, pas besoin d'intervention manuelle.

###### Générer la clé privée et la clé publique

Créer un répertoire temporaire config/jwt pour sotkcer la clé privée et la clé publique. Executer la commande sui vante dans le terminal :
```bash
# create a folder
$ mkdir -p config/jwt # For Symfony3+, no need of the -p option
 
# generate the private key and store it in temporary folder
# Provide a strong passphrase when asked and note it.
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
```

Lors de la génération de la clé privée, il faudra remplir une passphrase. Saisir une passphrase et la noter car nous en auron besoin plus tard pour la configuration.

```bash
# generate the public key using the private key
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
 
# You will be asked to verify the passphrase you provided earlier. 
```

La clé privée (private.pem) et la clé publique (public.pem) devraient être générées dans le dossier config/jwt.

###### Configurer les clés privées et publiques JWT

###### Récupérer la clé publique et privée en format base 64.
On obtient maintenant les clés publiques et privées en base64 en exécutant la commande suivante dans le terminal.
```bash
# Prints the private/public keys in base64 format
cat config/jwt/private.pem | base64 | tr -d '\n'        // S09obkNhWjZnaDUVTRFWQ4R0J4MkJMQUtLR0lZNEsxdEQxc....
cat config/jwt/public.pem | base64 | tr -d '\n'         // FQTRRRUdMVTRFWQ4R0J4MkJtS09obkNhW....
```

###### Mise à jour du fichier .env
Copier la clé publique et privée encodée en base 64 obtenue auparavant et mettre à jour les valeurs de JWT_SECRET_KEY et JWT_PUBLIC_KEY dans le fichier .env.
Mettre à jour également JWT_PASSPHRASE avec la même passphrase renseignée auparavent lors de la génération des clés.

Une fois cela fait, le répertoire config/jwt/* peut être supprimé, nous n'en avons plus besoin. Si vous voulez le garder, souvenez vous de ne pas l'envoyer sur GIT.

###### Mise à jour de lexik_jwt_authentication config
Pour Symfony 3.4, Symfony 4.x, et au dessus, un fichier de configuration est généré automatiquement dans config/packages/lexik_jwt_authentication.yaml. Pour les versions 3.3 et inférieures, ajouter le code suivant dans security.yaml
```php
### config/packages/lexik_jwt_authentication.yaml file ###
lexik_jwt_authentication:
    secret_key:       '%env(base64:JWT_SECRET_KEY)%' # required for token creation
    public_key:       '%env(base64:JWT_PUBLIC_KEY)%' # required for token verification
    pass_phrase:      '%env(JWT_PASSPHRASE)%'        # required for token creation, usage of an environment variable is recommended
    token_ttl:        7200                           # default is 3600 seconds
```

##### Autoriser les CORS
Modifier le fichier .env pour autoriser les requêtes de l'API pour une utilisation en ligne
```bash
###> nelmio/cors-bundle ###
CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'
###< nelmio/cors-bundle ###
```

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

[Symfony](https://www.udemy.com/course/apprendre-symfony-par-la-creation-dun-site-ecommerce/)
[Panier](https://www.digitalocean.com/community/tutorials/how-to-build-a-shopping-cart-with-vue-3-and-vuex)
[Token](https://digitalfortress.tech/php/jwt-authentication-with-symfony/)
[Authentification](https://www.bezkoder.com/vue-3-authentication-jwt/)


Et les documentations des technologies utilisées.
