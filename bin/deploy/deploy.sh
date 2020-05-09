#!/bin/sh
cd ../..
git pull
composer install
#chmod a+rw -R "var"
#cd bin/test
#sh "test with clean db.sh"
