<?php

namespace Core\Service;

use Core\Container;
use Core\Contract\ServiceInterface;

abstract class AbstractService implements ServiceInterface
{
    protected static $instance;
    protected $container;
    protected $service;

    protected function __construct(Container $container) {
        $this->container = $container;
        $this->setService();
    }

    public static function init()
    {
        if (is_null(static::$instance)) {
            $class_name = static::class;
            
            static::$instance = new $class_name(Container::init());
        }

        return static::$instance;
    }
}