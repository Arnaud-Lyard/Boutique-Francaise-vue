# Online Store API
An online store project separating the backend and frontend parts. Using Symfony as an API and retrieving data on the Vue.js side.

## Getting Started
Download the Git repository to initialize the project.

## Prerequisites
- Node.js
- Composer

## Installation
### Backend
Create a database and modify the .env file to point to the database:
```
DATABASE_URL=mysql://root@127.0.0.1:3306/database_name
```

Run the command `composer install` to install Symfony and its dependencies. Then, run the command symfony console `doctrine:migration:migrate` to create the database.

#### Generate SSH Keys
Installing LexikJWTAuthenticationBundle

For Symfony 2.x – Symfony 3.3:

```
// Register bundle in app/AppKernel.php:
public function registerBundles()
{
    return array(
        // ...
        new Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle(),
    );
}
```
For Symfony 3.4, Symfony 4.x, and above, the bundle is automatically installed, so no manual intervention is needed.

#### Generate Private and Public Keys
Create a temporary config/jwt directory to store the private and public keys. Run the following command in the terminal:
```
# create a folder
$ mkdir -p config/jwt # For Symfony 3+, no need for the -p option
 
# generate the private key and store it in the temporary folder
# Provide a strong passphrase when asked and note it.
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
```

While generating the private key, you will need to enter a passphrase. Make sure to note this passphrase, as it will be needed later for configuration.
```
# generate the public key using the private key
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```

You will be asked to verify the passphrase you provided earlier.
The private key (private.pem) and public key (public.pem) should now be generated in the config/jwt folder.

Configure JWT Private and Public Keys
Retrieve the private and public keys in base64 format. You can do this by running the following commands in the terminal:
```
# Prints the private/public keys in base64 format
cat config/jwt/private.pem | base64 | tr -d '\n'        // Example output: S09obkNhWjZnaDUVTRFWQ4R0J4MkJMQUtLR0lZNEsxdEQxc....
cat config/jwt/public.pem | base64 | tr -d '\n'         // Example output: FQTRRRUdMVTRFWQ4R0J4MkJtS09obkNhW....
```

#### Update the .env File
Copy the base64-encoded private and public keys obtained earlier and update the values for JWT_SECRET_KEY and JWT_PUBLIC_KEY in the .env file. Also, update JWT_PASSPHRASE with the same passphrase you used earlier during key generation.

Once done, the config/jwt/* directory can be deleted as it's no longer needed. If you want to keep it, remember not to commit it to GIT.

Update lexik_jwt_authentication Config
For Symfony 3.4, Symfony 4.x, and above, a configuration file is automatically generated in config/packages/lexik_jwt_authentication.yaml.
For versions 3.3 and below, add the following to security.yaml:

```
lexik_jwt_authentication:
    secret_key:       '%env(base64:JWT_SECRET_KEY)%' # required for token creation
    public_key:       '%env(base64:JWT_PUBLIC_KEY)%' # required for token verification
    pass_phrase:      '%env(JWT_PASSPHRASE)%'        # required for token creation, usage of an environment variable is recommended
    token_ttl:        7200                           # default is 3600 seconds
```

Enable CORS
Modify the .env file to allow API requests for online use:

```
###> nelmio/cors-bundle ###
CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'
###< nelmio/cors-bundle ###
```

### Frontend
Update the API routes for online use.

Run the command `npm install` to install the necessary modules.

## Starting the Application
### Backend
Run the command `symfony serve` to launch Symfony.
Access the backend part of the application locally at: http://127.0.0.1:8000

### Frontend
Run the command `npm run serve` to launch Vue.js.
Access the frontend part of the application locally at: http://127.0.0.1:8080

## Technologies Used
Symfony version 5
Vue.js version 3
