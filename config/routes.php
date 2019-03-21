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
$router->get('/task/:id/edit', 'TaskController::edit')
       ->with('id', '[0-9]+');
$router->post('/task/store', 'TaskController::store');
$router->post('/task/:id/update', 'TaskController::update')
       ->with('id', '[0-9]+');
$router->post('/task/:id/delete', 'TaskController::delete')
       ->with('id', '[0-9]+');