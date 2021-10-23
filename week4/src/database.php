<?php
class Database{
    private $conn;
    
    public function __construct($db_name){
        $this->setConnection($db_name);
    }
    private function setConnection($db_name){
        try{
            $this->conn = new PDO('sqlite:'. $db_name);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            echo "Database Error: " . $ex->getMessage();
            exit();
        }
    }
    public function execute($statement, $params=[]){
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>