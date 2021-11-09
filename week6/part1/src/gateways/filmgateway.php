<?php
namespace Src\Gateways;

use Src\Database\Database;
use Src\Gateways\Gateway as GatewaysGateway;

class FilmGateway extends GatewaysGateway{
    private $database;
    public function __construct(){
        $this->database = new Database(DATABASE);
    }

    public function findAll(){
        $sql = "SELECT * FROM film";
        $res = $this->database->executeSQL($sql);
        $this->setResult($res);
    }

    public function findOne($id){
        $sql = "SELECT * FROM film WHERE film_id = :id";
        $params = [":id" => $id];
        $res = $this->database->executeSQL($sql, $params);
        $this->setResult($res);
    }

    public function findByOffset($limit, $offset){
        $sql = "SELECT * FROM film ORDER BY title LIMIT :a offset :b";
        $params = [":a" => $limit, ":b" => $offset];
        $res = $this->database->executeSQL($sql, $params);
        $this->setResult($res);
    }
}