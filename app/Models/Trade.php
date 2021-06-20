<?php

namespace Models;

use Helpers\JsonChecker;

use InvalidArgumentException;
use Libraries\Database;
use PHPUnit\Util\InvalidDataSetException;

class Trade {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function trade($data) {
        if(!array_key_exists("player1", $data) || !array_key_exists("player2", $data) || !array_key_exists("trade_data", $data)) {
            throw new InvalidDataSetException('Faltam argumentos na requisição');
        } else if(!JsonChecker::isValid(base64_decode($data['trade_data']))) {
            throw new InvalidArgumentException("Invalid trade data");
        }

        $this->db->query('INSERT INTO trades (player_1, player_2, trade_data) VALUES (:player1, :player2, :trade_data)');
        $this->db->bind('player1', $data['player1']);
        $this->db->bind('player2', $data['player2']);
        $this->db->bind('trade_data', $data['trade_data']);
        return $this->db->execute() ? true : false;
    }

    public function getHistory() {
        $this->db->query('SELECT * FROM trades ORDER BY id DESC');
        return $this->db->fetchAll();
    }
}