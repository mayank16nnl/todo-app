<?php

use Core\App;
use Core\Database\{QueryBuilder, Connection};

App::bind('config', require dirname(__DIR__).'/config.php');

App::bind('database',  new QueryBuilder(
    Connection::make(App::get('config')['database'])
));