<?php
namespace Src\Gateways;

use Src\Database\Database;
use Src\Gateways\Gateway as GatewaysGateway;

class FilmGateway extends GatewaysGateway{
    private $sql = "SELECT film.film_id, film.title, film.description, film.length, film.rating, language.name AS language, category.name AS category 
                   FROM film 
                   JOIN language ON (film.language_id = language.language_id)
                   JOIN category ON (film.category_id = category.category_id) ";
    private $database;
    public function __construct(){
        $this->database = new Database(DATABASE);
    }

    public function findAll(){
        $res = $this->database->executeSQL($this->sql);
        $this->setResult($res);
    }

    public function findOne($id){
        $this->sql .= "WHERE film_id = :id";
        $params = [":id" => $id];
        $res = $this->database->executeSQL($this->sql, $params);
        $this->setResult($res);
    }

    public function findByOffset($limit, $offset){
        $this->sql .= "ORDER BY title LIMIT :a OFFSET :b";
        $params = [":a" => $limit, ":b" => $offset];
        $res = $this->database->executeSQL($this->sql, $params);
        $this->setResult($res);
    }

    public function findLanguage($lang_name){
        $this->sql .= "WHERE language.name = :name";
        $params = [":name" => $lang_name];
        $res = $this->database->executeSQL($this->sql, $params);
        $this->setResult($res);
    }

    public function findActor($actor_id){
        $this->sql .= "JOIN film_actor ON (film.film_id = film_actor.film_id) WHERE film_actor.actor_id = :id";
        $params = [":id" => $actor_id];
        $res = $this->database->executeSQL($this->sql, $params);
        $this->setResult($res);
    }
}