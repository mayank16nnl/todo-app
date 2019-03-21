<?php

use Core\Config;
use Core\Router\Router;
use Core\Request;

require dirname(__DIR__).'/vendor/autoload.php';
require dirname(__DIR__).'/core/bootstrap.php';

Router::load(dirname(__DIR__).'/config/routes.php')
      ->direct(Request::uri(), Request::method());
