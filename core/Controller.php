<?php

namespace Core;

use Core\App;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\Extension\DebugExtension;

class Controller
{
    // There should be a better way ;)
    protected $loader;
    protected $debug;
    protected $cache;
    protected $path;
    protected $twig;

    public function __construct()
    {
        // There should be a better way ;)
        $this->path = App::get('config')['path']['templates'];
        $this->debug = (App::get('config')['env']['dev']) ? true : false;
        $this->cache = (App::get('config')['env']['dev']) ? false : App::get('config')['path']['cache'];
        $this->loader = new FilesystemLoader($this->path);
        $this->twig = new Environment($this->loader, [
            'cache' => $this->cache,
            'debug' => $this->debug,
        ]);

        if ($this->debug) {
            $this->twig->addExtension(new DebugExtension);
        }
    }

    public function render($template, $data = [])
    {
        return display($this->twig->render($template, $data));
    }

    public function model($model)
    {
        $model = 'App\\Model\\'.ucfirst($model);

        return new $model();
    }
}