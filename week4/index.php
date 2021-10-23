<?php
include_once 'src/database.php';
$db = new Database('db/films2021.sqlite');
$result = $db->execute("select title from film where title like :title", ["title" => "%river%"]);
echo json_encode($result);
?>