<?php

namespace App\Controller;

use Core\Controller;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Display login page
     *
     * @return Twig\Environment
     */
    public function login()
    {
        return $this->render('user/login.html.twig');
    }

    /**
     * Display a user
     *
     * @param integer $id
     * @return Twig\Environment
     */
    public function show()
    {
        $user = $this->model('user')->get(5); // @todo

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * Edit a user
     *
     * @param integer $id
     * @return Twig\Environment
     */
    public function edit()
    {
        // $task = $this->model('user')->get($id); @todo
        $user = new User();
        $user->setName('Test');
        $user->setUsername('test93');
        $user->setEmail('test@gmail.com');
        $user = [
            'name' => $user->getName(), 
            'username' => $user->getUsername(), 
            'email' => $user->getEmail()
        ];

        return $this->render('user/edit.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * Store a user
     */
    public function store()
    {
        $user = [
            'name' => $_POST['signup-name'],
            'username' => $_POST['signup-username'],
            'email' => $_POST['signup-email'],
            'password' => password_hash($_POST['signup-password'], PASSWORD_DEFAULT),
        ];

        $this->model('user')->store($user);

        redirect('login');
    }


    /**
     * Update a user
     */
    public function update()
    {
        
        $form = [
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
        ];

        $this->model('user')->update($id, $form); // @todo

        redirect("profile");
    }
}