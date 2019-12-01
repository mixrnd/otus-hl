<?php

return [
    'database' => [
        'db' => [
            'connectionString' => getenv('DB_CONNECTION_STRING'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ],
        'shard1' => [
            'connectionString' => getenv('DB_CONNECTION_STRING_SHARD1'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ],
        'shard2' => [
            'connectionString' => getenv('DB_CONNECTION_STRING_SHARD2'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ],

    ]
];