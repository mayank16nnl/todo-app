<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{    
    public function home()
    {
        $tasks = App::get('database')->selectAll('tasks');

        require 'app/views/index.php';
    }

    public function about()
    {
        require 'app/views/about.php';        
    }

    public function contact()
    {
        require 'app/views/contact.php';        
    }
}

