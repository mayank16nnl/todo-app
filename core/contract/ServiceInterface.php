<?php

namespace Core\Contract;

interface ServiceInterface {
    /**
     * Instantiate service
     */
    public static function init();

    /**
     * Get service
     */
    public function getService();

    /**
     * Set service
     */
    public function setService();
}