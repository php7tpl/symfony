#!/bin/sh
cd ../../vendor/php7lab/eloquent/bin
php console db:delete-all-tables --withConfirm=0
php console db:migrate:up --withConfirm=0
php console db:fixture:import --withConfirm=0