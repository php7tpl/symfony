@echo off

cd ..
php console debug:container --env-vars --env=test
pause