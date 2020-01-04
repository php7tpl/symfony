@echo off

set rootDir="%~dp0/../../.."
set binDir=%rootDir%/vendor/php7lab/sandbox/bin

cd %binDir%
php console package:git:changed
pause