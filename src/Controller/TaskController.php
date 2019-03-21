<?php
namespace App\Controller;

use Core\Controller;

class TaskController extends Controller
{
    /**
     * Create a task
     *
     * @return Twig\Environment
     */
    public function new()
    {
        return $this->render('task/new.html.twig');
    }

    /**
     * Display a task
     *
     * @param integer $id
     * @return Twig\Environment
     */
    public function show($id)
    {
        $task = $this->model('task')->get($id);

        return $this->render('task/show.html.twig', [
            'task' => $task,
        ]);
    }

    /**
     * Edit a task
     *
     * @param integer $id
     * @return Twig\Environment
     */
    public function edit($id)
    {
        $task = $this->model('task')->get($id);

        return $this->render('task/edit.html.twig', [
            'task' => $task,
        ]);
    }

    /**
     * Store a task in database
     */
    public function store()
    {
        $task = [
            'title' => $_POST['title'],
        ];

        $this->model('task')->store($task);

        redirect();
    }

    /**
     * Update a task in database
     *
     * @param integer $id
     */
    public function update($id)
    {
        $form = [
            'title' => $_POST['title'],
        ];

        $this->model('task')->update($id, $form);

        redirect();
    }

    /**
     * Delete a task in database
     *
     * @param integer $id
     */
    public function delete($id)
    {
        $this->model('task')->delete($id);

        redirect();
    }
}