<?php

$config = require 'config.php';

require 'core/Router.php';
require 'core/Connection.php';
require 'core/Controller.php';

$pdo = Connection::make();