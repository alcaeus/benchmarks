#!/usr/bin/env bash
set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

docker compose up -d

trap 'docker compose stop' EXIT

echo "Waiting for MongoDB replica set to become healthy..." >&2
for i in $(seq 1 30); do
    status=$(docker inspect -f '{{.State.Health.Status}}' "$(docker compose ps -q mongodb)")
    [ "$status" = "healthy" ] && break
    sleep 2
done

if [ "$status" != "healthy" ]; then
    echo "MongoDB replica set did not become healthy in time" >&2
    exit 1
fi

report_file="BENCHMARKS.md"
generated_at=$(date -u +"%Y-%m-%d %H:%M:%S UTC")
php_version=$(php -r 'echo PHP_VERSION;')

output=$(vendor/bin/phpbench run --progress=none --report=default --report=ab-compare --output=console --no-ansi)

{
    echo "# Benchmark Report"
    echo
    echo "Generated on ${generated_at} with PHP ${php_version}."
    echo
    echo "Regenerate with \`composer report\` (requires Docker for the MongoDB benchmarks)."
    echo
    echo '```'
    echo "$output"
    echo '```'
} > "$report_file"

echo "Wrote $report_file" >&2
