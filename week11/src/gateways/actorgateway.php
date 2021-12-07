<?php
namespace Src\Gateways;

use Src\Database\Database;
use Src\Gateways\Gateway as Gateway;

class ActorGateway extends Gateway{
    private $sql = "SELECT actor_id, first_name, last_name, last_update
                   FROM actor ";
    private $database;
    public function __construct(){
        $this->database = new Database(DATABASE);
    }

    public function findAll(){
        $res = $this->database->executeSQL($this->sql);
        $this->setResult($res);
    }

    public function findOne($id){
        $this->sql .= "WHERE actor_id = :x";
        $params = [":x" => $id];
        $res = $this->database->executeSQL($this->sql, $params);
        $this->setResult($res);
    }

    public function findByOffset($limit, $offset){
        $this->sql .= "ORDER BY title LIMIT :a OFFSET :b";
        $params = [":a" => $limit, ":b" => $offset];
        $res = $this->database->executeSQL($this->sql, $params);
        $this->setResult($res);
    }
}