# Installation locale
install-local:
	composer install
	npm install
	npm run build

# Initialisation de la base de données
init-db:
	php bin/console doctrine:database:create
	php bin/console doctrine:migrations:migrate

# Import données locales
import-data:
	mysql -u <user> -p<password> supreme-enigma < supreme-enigma.sql  # A adapter

# Initialisation docker compose
launch-docker:
	cd docker && docker compose up -d

# Installation dépendances php docker
composer-docker:
	docker exec -it supreme-enigma-app composer install

# Initialisation de la base de données docker
init-db-docker:
	docker exec supreme-enigma-app sh -c "php bin/console doctrine:database:create && php bin/console doctrine:migrations:migrate"

# Import données docker
import-data-docker:
	docker exec supreme-enigma-db sh -c "mysql -u root supreme-enigma < /docker-entrypoint-initdb.d/supreme-enigma.sql"

# Lancement du serveur vite dans le conteneur
vite-dev-docker:
	docker exec supreme-enigma-node npm run dev
# Kill du serveur vite s'il a déjà été lancé
kill-vite-docker:
	docker/scripts/kill_vite.sh