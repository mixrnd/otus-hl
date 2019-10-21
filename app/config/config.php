<?php

return [
    'database' => [
        'db' => [
            'connectionString' => getenv('DB_CONNECTION_STRING'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ]
    ]
];