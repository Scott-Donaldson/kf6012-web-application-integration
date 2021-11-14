<?php

namespace Src\Database;

use PDO;

class Connection {
    private $connection;

    public function __construct($name){
        $this->setConnection($name);
    }

    private function setConnection($name){
        $this->connection = new PDO('sqlite:' . $name);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection(){
        return $this->connection;
    }
}