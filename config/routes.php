<?php

$router::get('', 'PageController::home');
$router::get('about', 'PageController::about');
$router::get('contact', 'PageController::contact');
$router::post('contact', 'PageController::contact');
$router::get('new', 'TaskController::new');
$router::post('store', 'TaskController::store');