@echo off

set rootDir="%~dp0/../../.."
set binDir=%rootDir%/vendor/php7lab/sandbox/bin

cd %binDir%
php console generator:domain
pause

REM use --withConfirm=0 for skip dialog