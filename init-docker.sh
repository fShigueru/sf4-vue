#!/usr/bin/env bash

cd front/ && bash init.sh
cd .. && docker build -t fshigueru/front front/.
docker build -t fshigueru/php7.1 php/.
docker build -t fshigueru/nginx nginx/.
docker build -t fshigueru/redis redis/.

docker-compose up -d