<?php
namespace Src\Gateways;

class ViewingListGateway extends Gateway {

    public function __construct(){
        $this->setDatabase(USER_DATABASE);
    }
    public function findAll($uid){
        $sql = "SELECT DISTINCT film_id FROM list WHERE user_id = :uid";
        $params = [":uid" => $uid];
        $this->setResult($this->getDatabase()->executeSQL($sql, $params));
    }
    public function add($uid, $add){
        $sql = "INSERT INTO list (user_id, film_id) VALUES (:uid, :film)";
        $params = [":uid" => $uid, ":film" => $add];
        $this->setResult($this->getDatabase()->executeSQL($sql, $params));
    }

    public function remove($uid, $rem){
        $sql = "DELETE FROM list WHERE (user_id = :uid) AND (film_id = :film)";
        $params = [":uid" => $uid, ":film" => $rem];
        $this->setResult($this->getDatabase()->executeSQL($sql, $params));
    }
}