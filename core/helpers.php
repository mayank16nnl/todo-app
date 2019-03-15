<?php

function display($template) {
    echo $template;
}

function redirect($path = null) {
    header("Location: /{$path}");
}