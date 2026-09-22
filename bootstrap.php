<?php

require __DIR__ . '/vendor/autoload.php';

if (getenv('MONGODB_URI') === false) {
    $output = [];
    $exitCode = 0;
    exec(
        'docker compose -f ' . escapeshellarg(__DIR__ . '/compose.yaml') . ' port mongodb 27017 2>&1',
        $output,
        $exitCode,
    );

    if ($exitCode !== 0 || $output === []) {
        throw new RuntimeException(
            'Could not determine the MongoDB port exposed by Docker Compose. Make sure the replica '
            . 'set is running (`docker compose up -d`), or set the MONGODB_URI environment variable manually.',
        );
    }

    [, $port] = explode(':', trim($output[0]));

    // directConnection avoids the driver independently monitoring the replica set's
    // advertised member host ("localhost:27017"), which on the host machine may
    // resolve to a completely unrelated mongod bound to that same port.
    putenv('MONGODB_URI=mongodb://127.0.0.1:' . $port . '/?replicaSet=rs0&directConnection=true');
}
