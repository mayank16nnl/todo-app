<?php

return [
    'env' => [
        'dev' => true,
    ],
    'path' => [
        'app' => dirname(__DIR__).'/src',
        'core' => dirname(__DIR__).'/core',
    ],
    'database' => [
        'dsn' => 'mysql:host=localhost;dbname=todo-app',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ],
    'twig' => [
        'templates' => dirname(__DIR__).'/templates',
        'cache' => dirname(__DIR__).'/cache',
    ]
];