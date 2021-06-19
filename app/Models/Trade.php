<?php

namespace Models;

use Libraries\Database;

class Trade {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function trade($data) {
        $this->db->query('INSERT INTO trades (player_1, player_2, trade_data) VALUES (:player1, :player2, :trade_data)');
        $this->db->bind('player1', $data['player1']);
        $this->db->bind('player2', $data['player2']);
        $this->db->bind('trade_data', $data['trade_data']);
        $result = $this->db->execute() ? true : false;
        return $result;
    }

    public function getHistory() {
        $this->db->query('SELECT * FROM trades ORDER BY id DESC');
        return $this->db->fetchAll();
    }
}