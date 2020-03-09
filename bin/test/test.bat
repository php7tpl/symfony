@echo off

set rootDir="%~dp0/../.."
set phpunit="vendor/phpunit/phpunit/phpunit"
set cacheDir="var/cache/test"

cd %rootDir%
::if exist %cacheDir% rmdir /Q /S %cacheDir%
php %phpunit%
pause