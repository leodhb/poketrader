<?php

namespace app\Database;

use PDO;

define( 'MYSQL_HOST'    , '' );
define( 'MYSQL_USER'    , '' );
define( 'MYSQL_PASSWORD', '' );
define( 'MYSQL_DB_NAME' , '' );

class Connection {
    private $Connection;

    public function __construct() {
        $this->Connection = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
    }
}