<?php
namespace App\Controller;

use Core\Container;
use Core\Controller;

class TaskController extends Controller
{
    public function new()
    {
        return $this->render('task/new.html.twig');
    }

    public function store()
    {
        $this->getContainer()->get('database')->create('task', [
            'title' => $_POST['title'],
        ]);

        return redirect();
    }
}