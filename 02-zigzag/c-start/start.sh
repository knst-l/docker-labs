#!/bin/sh
set -eu

repo=${GIT_URL:-https://github.com/michaelkolesidis/zigzag.git}
ref=${GIT_REF:-3c09ccbbcdff11bc8abc4b3b7444f46ab2e8c13a}

cd /app
git init
git fetch --depth 1 "$repo" "$ref"
git checkout --detach FETCH_HEAD
HUSKY=0 pnpm install --frozen-lockfile
pnpm run build
exec pnpm run preview --host 0.0.0.0 --port 80 --strictPort
