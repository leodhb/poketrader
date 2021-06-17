<?php

namespace Controllers;

use Libraries\Controller;

class Trade extends Controller{
    public function __construct()
    {
        
    }

    public function index() {
        $this->view('pages/home');
    }

    public function history() 
    {
        $this->view('pages/history');
    }
}