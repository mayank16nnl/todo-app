<?php

namespace App\Model;

use Core\Model;

class Task extends Model
{
    /**
     * Return a task
     *
     * @param integer $id
     * @return array
     */
    public function get($id)
    {
        return $this->pdo->find($this->table, $id);
    }

    /**
     * Return all tasks
     *
     * @return array
     */
    public function getAll()
    {
        return $this->pdo->findAll($this->table);
    }

    /**
     * Store a task
     *
     * @param array $parameters
     * @return boolean
     */
    public function store($parameters)
    {
        return $this->pdo->store($this->table, $parameters);
    }

    /**
     * Update a task
     *
     * @param integer $id
     * @param array $parameters
     * @return boolean
     */
    public function update($id, $parameters)
    {
        return $this->pdo->update($this->table, $id, $parameters);
    }

    /**
     * Delete a task
     *
     * @param integer $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->pdo->delete($this->table, $id);
    }
}