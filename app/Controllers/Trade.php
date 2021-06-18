<?php

namespace Controllers;
use Libraries\Controller;

class Trade extends Controller{
    
    private $tradeModel;

    public function __construct()
    {
       $this->tradeModel = $this->model('Trade'); 
    }

    public function index() {
        $trade = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($trade)) {

            $data = [
                'player1' => trim($trade['player1']),
                'player2' => trim($trade['player2']),
                'trade_data' => trim($trade['trade_data'])
            ];
            var_dump($trade);
            $this->tradeModel->trade($data);
        }

        $this->view('pages/home');
    }

    public function history() 
    {
        $data = $this->tradeModel->getHistory();
        $this->view('pages/history', $data);
    }
}