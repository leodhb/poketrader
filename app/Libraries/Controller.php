<?php

namespace Libraries;
use Models\Trade;

class Controller {

    public function model($model) {
        switch($model) {
            case 'Trade':
                return new Trade();
            default: 
                die('Model not found');
        }
    }
    
    public function view($view, $data = []) {
        $path = dirname(__FILE__) . '/../Views/'.$view.'.php';
        if(file_exists($path)) {
            require_once  dirname(__FILE__) . '/../Views/components/header.php';
            require_once $path;
            require_once dirname(__FILE__) . '/../Views/components/footer.php';
        } else {
            die('View not found' . $path);
        }
    }

    public function error404() {
        $this->view('pages/errors/404');
    }
}