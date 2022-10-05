#!/bin/bash

docker-compose exec app composer update --ignore-platform-reqs
docker-compose exec app composer install
docker-compose exec app chmod 777 ./web/assets -R
docker-compose exec app chmod 777 ./runtime -R