#!/bin/bash

docker-compose exec app composer self-update
docker-compose exec app composer create-project --prefer-dist yiisoft/yii2-app-basic .

