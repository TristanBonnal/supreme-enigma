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
# Après avoir paramétré le dsn de la db dans le .env.local
make launch-docker
make composer-docker
make init-db-docker
make import-data-docker
```
Lancer le serveur de dev avec vite dans le conteneur :
```bash
make vite-dev-docker
# Si le serveur à déjà été lancé, le port 5173 sera occupé, il faut donc le kill :
make kill-vite-docker
```
Ajouter la ligne suivante au fichier /etc/hosts
> 127.0.0.1    supreme-enigma.local

Accéder à l'application : http://supreme-enigma.local:8080 
