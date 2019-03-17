<?php

namespace App\Controller;

use Core\Container;
use Core\Controller;

class PageController extends Controller
{    
    public function home()
    {
        $tasks = $this->getContainer()->get('database')->findAll('task');

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

