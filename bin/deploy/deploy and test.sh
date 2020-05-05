#!/bin/sh
cd ../..
git pull
#composer install

cd bin/test
sh "test with clean db.sh"
