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

        return $this->render('page/home.html.twig', [
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
        return $this->render('page/about.html.twig');        
    }

    /**
     * Display contact page
     *
     * @return Twig\Environment
     */
    public function contact()
    {
        return $this->render('page/contact.html.twig');        
    }
}

