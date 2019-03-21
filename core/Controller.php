<?php

namespace Core;

use Core\Container;

class Controller
{
    /**
     * Render a template
     *
     * @param string $template
     * @param array $data
     * @return Twig\Environment
     */
    protected function render($template, $data = [])
    {
        return display(Container::init()->get('twig')->render($template, $data));
    }

    /**
     * Get a model
     *
     * @param string $model
     * @return object
     */
    protected function model($model)
    {
        $model = 'App\\Model\\'.ucfirst($model);

        return new $model();
    }
}