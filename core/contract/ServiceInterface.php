<?php

namespace Core\Contract;

interface ServiceInterface {
    public static function init();
    public function getService();
    public function setService();
}