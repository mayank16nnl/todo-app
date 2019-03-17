<?php

namespace Core\Service;

use Twig\Environment;
use Core\Service\AbstractService;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

class Twig extends AbstractService
{
    public function getService() {
        return $this->service;
    }

    public function setService()
    {   
        $loader = new FilesystemLoader(
            $this->container->get('config')['twig']['templates']
        );

        $this->service = new Environment($loader, $this->getConfig());
    }

    public function addExtension($extension)
    {
        $this->service->addExtension($extension);

        return $this;
    }

    private function getConfig()
    {
        $isDevEnv = $this->container->get('config')['env']['dev'];
        $config = [
            $cache = $isDevEnv ? false : $this->container->get('config')['twig']['cache'],
            $debug = $isDevEnv ? true : false,
        ];

        return $config;
    }
}