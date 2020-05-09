#!/bin/sh
cd ../..
git pull
composer install --no-dev
#chmod a+rw -R "var"
#cd bin/test
#sh "test with clean db.sh"
