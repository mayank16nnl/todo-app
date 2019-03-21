<?php

namespace Core\Database;

class QueryBuilder
{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Insert an entry
     *
     * @param string $table
     * @param array $parameters
     * @return boolean
     */
    public function store($table, $parameters = [])    
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

    /**
     * Get an entry
     *
     * @param string $table
     * @param integer $id
     * @return array
     */
    public function find($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
        $statement->bindValue(':id', $id);

        $statement->execute();

        return $statement->fetch();
    }

    /**
     * Get all entries
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
     * Update an entry
     *
     * @param string $table
     * @param integer $id
     * @param array $parameters
     * @return boolean
     */
    public function update($table, $id, $parameters = [])
    {
        $values = [];

        foreach (array_keys($parameters) as $parameter) {
            $values[] = $parameter . ' = :' . $parameter;
        }

        $statement = sprintf(
            "UPDATE %s SET %s WHERE id = %s",
            $table,
            implode(', ', $values),
            $id
        );

        $statement = $this->pdo->prepare($statement);

        return $statement->execute($parameters);
    }

    /**
     * Delete an entry 
     *
     * @param string $table
     * @param integer $id
     * @return boolean
     */
    public function delete($table, $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE id = :id");
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }
}