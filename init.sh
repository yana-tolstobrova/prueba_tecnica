#!/bin/bash

C='\033[0;36m'
N='\033[0m'

echo ${C}  "Launching docker containers."${N}
cd backend
docker-compose up -d
echo ${C}  "Docker containers launched."${N}
echo ${C} "Installing composer dependencies."${N}
docker exec backend composer install
echo ${C}  "Building app inside containers."${N}
docker exec backend php artisan migrate
docker exec backend php artisan db:seed
cd ../frontend
docker-compose up -d
echo ${C}  "App is ready at localhost:8080." ${N}