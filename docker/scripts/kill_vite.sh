#!/bin/bash

docker exec -it supreme-enigma-node sh -c "ps aux | grep vite | grep -v grep | awk '{print \$2}' | xargs kill -9 2>/dev/null" || echo "Erreur: Aucun serveur vite actif"
