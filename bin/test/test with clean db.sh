#!/bin/sh
cd ../..
rm -rf var/cache/test

cd vendor/php7lab/eloquent/bin
php console_test db:migrate:down --withConfirm=0
php console_test db:delete-all-tables --withConfirm=0
php console_test db:migrate:up --withConfirm=0
php console_test db:fixture:import --withConfirm=0

cd ../../../..
php vendor/phpunit/phpunit/phpunit