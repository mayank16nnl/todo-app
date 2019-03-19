<?php

// Pages
$router->get('/', 'PageController::home');
$router->get('/about', 'PageController::about');
$router->get('/contact', 'PageController::contact');
$router->post('/contact', 'PageController::contact');

// Tasks
$router->get('/task/new', 'TaskController::new');
$router->get('/task/:id', 'TaskController::show')
       ->with('id', '[0-9]+');
$router->post('/store', 'TaskController::store');
$router->post('/delete/:id', 'TaskController::delete');