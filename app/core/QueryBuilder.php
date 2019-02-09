<?php
class QueryBuilder
{
    public function selectAll($table)
    {
        $statement = $pdo->prepare('SELECT * FROM {$table}');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
    }
}