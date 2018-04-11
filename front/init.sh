#!/usr/bin/env bash

directory_site=$PWD/../src/site
if [ ! -d "$directory_site" ]; then
    echo 'Criando diretorio front'
    mkdir $PWD/../src/
    mkdir $PWD/../src/site
  #  cp -a $PWD/site $PWD/../src/site
fi

directory_admin=$PWD/../src/admin
if [ ! -d "$directory_admin" ]; then
    echo 'Criando diretorio src/admin'
    mkdir $PWD/../src/admin
fi

