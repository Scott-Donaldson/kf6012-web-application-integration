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
}