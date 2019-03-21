<?php

namespace Core\Service;

use Twig\Environment;
use Core\Service\AbstractService;
use Twig\Loader\FilesystemLoader;

class Twig extends AbstractService
{
    /**
     * Get service
     *
     * @return Twig\Environment
     */
    public function getService() {
        return $this->service;
    }

    /**
     * Set service
     */
    public function setService()
    {   
        $loader = new FilesystemLoader(
            $this->container->get('config')['twig']['templates']
        );

        $this->service = new Environment($loader, $this->getConfig());
    }

    /**
     * Add extension
     *
     * @param mixed $extension
     * @return Twig
     */
    public function addExtension($extension)
    {
        $this->service->addExtension($extension);

        return $this;
    }

    /**
     * Set config
     *
     * @return array
     */
    private function getConfig()
    {
        $isDevEnv = $this->container->get('config')['env']['dev'];
        $config = [
            'cache' => $isDevEnv ? false : $this->container->get('config')['twig']['cache'],
            'debug' => $isDevEnv ? true : false,
        ];

        return $config;
    }
}