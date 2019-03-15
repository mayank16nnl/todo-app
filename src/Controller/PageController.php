<?php

namespace App\Controller;

use Core\App;
use Core\Controller;

class PageController extends Controller
{    
    public function home()
    {
        $tasks = App::get('database')->findAll('task');

        return $this->render('pages/home.html.twig', [
            'tasks' => $tasks,
        ]);
    }

    public function about()
    {
        return $this->render('pages/about.html.twig');        
    }

    public function contact()
    {
        return $this->render('pages/contact.html.twig');        
    }
}

