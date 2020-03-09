@echo off

set rootDir="%~dp0/../.."
set eloquentBinDir="%rootDir%/vendor/php7lab/eloquent/bin"
set phpunit="vendor/phpunit/phpunit/phpunit"

cd %eloquentBinDir%
php console_test db:migrate:down --withConfirm=0
php console_test db:delete-all-tables --withConfirm=0
php console_test db:migrate:up --withConfirm=0
php console_test db:fixture:import --withConfirm=0

cd %rootDir%
php %phpunit%
pause