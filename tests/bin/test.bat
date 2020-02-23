@echo off

set rootDir="%~dp0/../.."
set phpunit="vendor/phpunit/phpunit/phpunit"

cd %rootDir%

php yii_test migrate --interactive=0
php %phpunit%
pause