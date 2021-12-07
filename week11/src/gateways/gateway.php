<?php
namespace Src\Gateways;
use Src\Database\Database;

abstract class Gateway {
    private $database;
    private $result;

    protected function setDatabase($databaseName){
        $this->database = new Database($databaseName);
    }
    protected function getDatabase(){
        return $this->database;
    }
    protected function setResult($result){
        $this->result = $result;
    }
    public function getResult(){
        return $this->result;
    }
    public function getNext($limit, $offset){
        $next_offset = (int)$offset + (int)$limit;
        $params = "?limit=$limit&offset=$next_offset" ;
        return $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?') . $params;
    }
}