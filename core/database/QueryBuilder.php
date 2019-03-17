<?php

namespace Core\Database;

class QueryBuilder
{
    protected $pdo;
    protected $statement;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Display all entries from a table
     *
     * @param string $table
     * @return array
     */
    public function findAll($table, $orderBy = 'DESC')
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} ORDER BY id {$orderBy}");

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS, 'App\\Model\\'.ucfirst($table));
    }

    /**
     * Insert an entry in a table
     *
     * @param string $table
     * @param array $parameters
     * @return boolean
     */
    public function create($table, $parameters = [])    
    {
        $statement = sprintf(
            "INSERT INTO %s(%s) VALUES(%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ':'.implode(', :', array_keys($parameters))
        );

        $statement = $this->pdo->prepare($statement);

        return $statement->execute($parameters);
    }
}