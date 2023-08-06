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

Accéder à l'application : http://supreme-enigma.local:8080