<?php
class Core
{
    protected $controller = 'Index';
    protected $method = 'index';
    protected $params = array();

    public function __construct() {
        $url = $this->getUrl();

        // Controller Init
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->controller = ucwords($url[0]);    
            unset($url[0]);        
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        // Method Init
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Params Init
        $this->params = $url ? array_values($url): array();

        call_user_func_array(array($this->controller, $this->method), $this->params);        
    }

    private function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }       
    }
}