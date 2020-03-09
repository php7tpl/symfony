@echo off

set rootDir="%~dp0/../.."
set cacheDir="var/cache/test"

cd %rootDir%
if exist %cacheDir% rmdir /Q /S %cacheDir%

pause