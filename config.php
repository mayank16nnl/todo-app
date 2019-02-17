<?php

return [
    'database' => [
        'connection' => 'mysql:host=localhost',
        'name' => 'todo-app',
        'username' => 'superroot',
        'password' => 'superroot',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];