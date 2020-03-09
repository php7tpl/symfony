@echo off

set rootDir="%~dp0/../.."
set phpunit="vendor/phpunit/phpunit/phpunit"

cd %rootDir%
rmdir /Q /S "var/cache/test"
php %phpunit%
pause