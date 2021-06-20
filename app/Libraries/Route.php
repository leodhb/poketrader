<?php

namespace Libraries;
use Controllers\Trade;

class Route {
    private $controller;
    private $method;

    public function __construct() {
        $url = $this->url() ? $this->url() : [0];
        
        //this project only have a single Trade controller, so we don't need to check an URL to load
        $this->controller = new Trade();

        if($url[0] === 0) {
            $this->method = 'index';
        } else if (method_exists($this->controller, $url[0])) {
            $this->method = $url[0];
            unset($url[0]);
        } else {
            $this->method = 'error404';
        }

        $this->controller->{$this->method}();
        //var_dump($this);
    }

    private function url() {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        if(isset($url)) {
            $url = trim(rtrim($url));
            $url = explode('/', $url);
        }
        
        return $url;
    }

}