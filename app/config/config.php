<?php

return [
    'database' => [
        'db' => [
            'connectionString' => getenv('DB_CONNECTION_STRING'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ],
        'db_replica' => [
            'connectionString' => getenv('DB_CONNECTION_STRING_REPL'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ]

    ]
];