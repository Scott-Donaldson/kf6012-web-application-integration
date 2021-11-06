<?php
class ActorGateway extends Gateway{

    public function __construct(){
        $this->setDatabase(DATABASE);
    }
    public function findAll(){
        $sql = "SELECT * FROM actor";
        $res = $this->getDatabase()->execute($sql);
        $this->setResult($res);
    }
    public function findOne($id){
        $sql = "SELECT * FROM actor WHERE actor_id = :id";
        $params = ["id" => $id];
        $res = $this->getDatabase()->execute($sql, $params);
        $this->setResult($res);
    }
}