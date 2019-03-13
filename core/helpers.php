<?php

function view($name, $data = []) {
    extract($data);

    return require dirname(__DIR__)."/app/views/{$name}.view.php";
}

function redirect($path) {
    header("Location: /{$path}");
}