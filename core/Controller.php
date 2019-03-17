<?php

namespace Core;

use Core\Container;

class Controller
{
    protected function render($template, $data = [])
    {
        return display(Container::init()->get('twig')->render($template, $data));
    }

    protected function model($model)
    {
        $model = 'App\\Model\\'.ucfirst($model);

        return new $model();
    }

    protected function getContainer() {
        return Container::init();
    }
}