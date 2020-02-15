@echo off

set rootDir="%~dp0/../.."
set binDir=%rootDir%/vendor/php7lab/dev/bin

cd %binDir%
php console generator:module
pause

REM use --withConfirm=0 for skip dialog
