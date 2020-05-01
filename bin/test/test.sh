#!/bin/sh
cd ../..
#chmod -R a+rw var
rm -rf var/cache/test/*
rm var/log/test.log

php vendor/phpunit/phpunit/phpunit