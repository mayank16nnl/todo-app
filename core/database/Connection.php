<?php

namespace Core\Database;

class Connection
{
    /**
     * Connect to database
     *
     * @param array $config
     * @return \PDO
     */
    public static function make($config)
    {
        try {
            return new \PDO(
                $config['dsn'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch(\PDOException $e) {
            die($e->getMessage());
        }
    }
}