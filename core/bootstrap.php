<?php

use Core\Container;
use Core\Database\{QueryBuilder, Connection};
use Core\Service\Twig;
use Twig\Extension\DebugExtension;

$container = Container::init();

// Config
$container->bind('config', require dirname(__DIR__).'/config/config.php');

// Database
$container->bind('database', new QueryBuilder(
    Connection::make($container->get('config')['database'])
));

// Services
$container->bind('twig', 
    Twig::init()->addExtension(new DebugExtension)
                ->getService()
);