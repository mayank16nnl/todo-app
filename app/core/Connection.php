<?php

class Connection
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=todo-app', 'superroot', 'superroot');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}

Connection::make();