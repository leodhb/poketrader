<?php

namespace Libraries;

class Controller {
    public function model($model) {
        require_once '../app/Models/' . $model . '.php';
        return new $model;
    }

    public function view ($view, $data = []) {
        $path = '../app/Views/'.$view.'.php';
        if(file_exists($path)) {
            require_once $path;
        } else {
            die('View not found');
        }
    }
}