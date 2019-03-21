<?php

namespace Core;

class Model
{
    protected $table;
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Container::init()->get('database');
        $this->setTable();
    }

    protected function setTable($table = null)
    {
        if (isset($table)) {
            $this->table = strtolower($table);
        } else {
            $class_name = explode('\\', static::class);

            $this->table = strtolower(end($class_name));
        }
    }
}