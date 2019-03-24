<?php

namespace App\Model;

use Core\Model;

class User extends Model
{
    private $name;
    private $username;
    private $email;

    /**
     * Return user's name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * Return user's username
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Return user's email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set user's name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;    
    }
    
    /**
     * Set user's username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;    
    }

    /**
     * Set user's email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Return a user
     *
     * @param integer $id
     * @return array
     */
    public function get($id)
    {
        return $this->pdo->find($this->table, $id);
    }

    /**
     * Return all users
     *
     * @return array
     */
    public function getAll()
    {
        return $this->pdo->findAll($this->table);
    }

    /**
     * Store a user
     *
     * @param array $parameters
     * @return boolean
     */
    public function store($parameters)
    {
        return $this->pdo->store($this->table, $parameters);
    }

    /**
     * Update a user
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
     * Delete a user
     *
     * @param integer $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->pdo->delete($this->table, $id);
    }
}