<?php

namespace App\Controller;

use Core\Controller;

class PageController extends Controller
{   
    /**
     * Display homepage
     *
     * @return Twig\Environment
     */ 
    public function home()
    {
        $tasks = $this->model('task')->getAll();

        return $this->render('pages/home.html.twig', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Display about page
     *
     * @return Twig\Environment
     */
    public function about()
    {
        return $this->render('pages/about.html.twig');        
    }

    /**
     * Display contact page
     *
     * @return Twig\Environment
     */
    public function contact()
    {
        return $this->render('pages/contact.html.twig');        
    }
}

