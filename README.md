## Installation locale : 
```bash
composer install
npm install
npm run build
```
Configurer le dsn de la db dans le .env.local puis lancer les migrations
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```
## Lancement stack docker : 
```bash
# Lancer le docker-compose
cd docker && docker compose up -d

# Lancer le composer install
docker exec -it supreme-enigma-app composer install

# Après avoir paramétré le .env pour la db suivant le docker-compose, lancer l'initiation puis les migrations
docker exec -it supreme-enigma-app php bin/console doctrine:database:create
docker exec -it supreme-enigma-app php bin/console doctrine:migrations:migrate
```
Ajouter la ligne suivante au fichier /etc/hosts
> 127.0.0.1    supreme-enigma.local

Accéder à l'application : http://supreme-enigma.local:8080 
