<?php
class Database{
    private $conn;
    
    public function __construct($db_name){
        $this->setConnection($db_name);
    }
    private function setConnection($db_name){
        $this->conn = new PDO('sqlite:'. $db_name);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function execute($statement, $params=[]){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>