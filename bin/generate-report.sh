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

# phpbench's console renderer draws ASCII-bordered tables (+---+ / | ... |). Convert
# those into GitHub-flavoured markdown tables (strip the border lines, insert a
# "|---|...|" header separator) so the report renders as real tables, not preformatted
# text.
markdown_output=$(printf '%s\n' "$output" | awk '
    function is_border(l) { return l ~ /^\+[-+]+\+$/ }
    BEGIN { in_table = 0; header_done = 0 }
    {
        line = $0

        if (line == "Operator vs Pipeline") {
            print "## Operator vs Pipeline"
            print ""
            next
        }

        if (is_border(line)) {
            if (in_table == 0) {
                in_table = 1
            } else if (header_done == 0) {
                n = split(header_line, cells, "|")
                sep = "|"
                for (i = 2; i < n; i++) sep = sep " --- |"
                print sep
                header_done = 1
            } else {
                in_table = 0
                header_done = 0
            }
            next
        }

        if (in_table && header_done == 0) header_line = line

        print line
    }
')

{
    echo "# Benchmark Report"
    echo
    echo "Generated on ${generated_at} with PHP ${php_version}."
    echo
    echo "Regenerate with \`composer report\` (requires Docker for the MongoDB benchmarks)."
    echo
    echo "## Full run"
    echo
    echo "$markdown_output"
} > "$report_file"

echo "Wrote $report_file" >&2
