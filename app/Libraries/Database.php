<?php

namespace Libraries;

use PDO, PDOException;

class Database {
    private $host = 'localhost';
    private $user = 'leod';
    private $password = 'cG9rZXRyYWRlcmJlbW1hc3Nh';
    private $db_name = 'poketrader_leod';
    private $connection;
    private $stmt;

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

    public function query($sql) {
        $this->stmt = $this->connection->prepare($sql);
    }

    public function bind($parameter, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value): 
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($parameter, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function fetch() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchAll() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //that's all. We don't need to use some functions like rowCount or lastIndex
}