<?php

return [
    'database' => [
        'dsn' => 'mysql:host=localhost;dbname=todo-app',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];