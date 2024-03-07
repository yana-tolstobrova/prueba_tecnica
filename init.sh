#!/bin/bash

C='\033[0;36m'
N='\033[0m' # No Color

echo ${C}  "Launching docker containers."${N}
cd backend
docker-compose up -d
echo ${C}  "Docker containers launched."${N}
echo ${C} "Waiting for database container to initialize."${N}
sleep 30
echo ${C}  "Building app inside containers."${N}
docker exec -it backend php artisan optimize
docker exec -it backend php artisan migrate:fresh
docker exec -it backend php artisan db:seed
cd ../frontend
docker-compose up -d
echo ${C}  "App is ready at localhost:8080." ${N}