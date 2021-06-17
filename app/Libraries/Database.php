<?php

namespace Libraries;

use PDO, PDOException;

class Database {
    private $host = 'localhost';
    private $user = 'leod';
    private $password = 'cG9rZXRyYWRlcmJlbW1hc3Nh';
    private $db_name = 'poketrader_leod';
    private $connection;
    

    public function __construct() {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->connection = new PDO('mysql:host=' . $this->host .';dbname='. $this->db_name, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            die('Erro: ' . $e->getMessage());
        }
        
    }
}