#!/usr/bin/env bash
set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

docker compose up -d

trap 'docker compose stop' EXIT

echo "Waiting for MongoDB replica set to become healthy..."
for i in $(seq 1 30); do
    status=$(docker inspect -f '{{.State.Health.Status}}' "$(docker compose ps -q mongodb)")
    [ "$status" = "healthy" ] && break
    sleep 2
done

if [ "$status" != "healthy" ]; then
    echo "MongoDB replica set did not become healthy in time" >&2
    exit 1
fi

if [ "$#" -eq 0 ]; then
    vendor/bin/phpbench run
else
    vendor/bin/phpbench run "$@"
fi
