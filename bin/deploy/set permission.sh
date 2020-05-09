#!/bin/sh
cd ../..
ls
chmod a+rw -R "common/runtime"
chmod a+rw -R "frontend/runtime"
chmod a+rw -R "backend/runtime"
chmod a+rw -R "api/runtime"
chmod a+rw -R "console/runtime"

chmod a+rw -R "frontend/web/assets"
chmod a+rw -R "backend/web/assets"
