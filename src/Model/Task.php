<?php

namespace App\Model;

use Core\Model;

class Task extends Model
{
    private $title;

    /**
     * Return task's title
     *
     * @param string $title
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set task's title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Return a task
     *
     * @param integer $id
     * @return array
     */
    public function get($id): array
    {
        return $this->pdo->find($this->table, $id);
    }

    /**
     * Return all tasks
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->pdo->findAll($this->table);
    }

    /**
     * Store a task
     *
     * @param array $parameters
     * @return boolean
     */
    public function store($parameters): bool
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
    public function update($id, $parameters): bool
    {
        return $this->pdo->update($this->table, $id, $parameters);
    }

    /**
     * Delete a task
     *
     * @param integer $id
     * @return boolean
     */
    public function delete($id): bool
    {
        return $this->pdo->delete($this->table, $id);
    }
}