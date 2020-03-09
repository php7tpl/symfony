@echo off

set rootDir="%~dp0/../.."
set cacheDir="var/cache/dev"

cd %rootDir%
if exist %cacheDir% rmdir /Q /S %cacheDir%

pause