<?php

return [
    'database' => [
        'connection' => 'mysql:host=localhost',
        'name' => 'todo-app',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];