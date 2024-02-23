## Installation locale : 
```bash
make install-local
```
Configurer le dsn de la db dans le .env.local puis lancer les migrations
```bash
make init-db
```

## Lancement stack docker : 
```bash
# Après avoir paramétré le .env pour la db suivant le docker-compose, lancer l'initiation puis les migrations
# Initialisation docker compose
make launch-docker

# Initialisation de la base de données docker
docker exec supreme-enigma-app php bin/console doctrine:database:create
docker exec supreme-enigma-app php bin/console doctrine:migrations:migrate

# Import données docker
make import-data-docker
```
Ajouter la ligne suivante au fichier /etc/hosts
> 127.0.0.1    supreme-enigma.local

Accéder à l'application : http://supreme-enigma.local:8080 
