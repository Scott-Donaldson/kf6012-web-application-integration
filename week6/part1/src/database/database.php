<?php

namespace Src\Database;
use PDO;
class Database {
    public $connection;

    public function __construct($databaseName){
        $this->connection = new Connection($databaseName);
        $this->connection = $this->connection->getConnection();
    }
    
    public function executeSQL($sql, $params=[]){
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}