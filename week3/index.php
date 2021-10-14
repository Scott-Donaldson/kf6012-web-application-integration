<?php
include 'src/webpage.php';
$webpage = new Webpage("Home", "Welcome");
echo $webpage->generateWebpage();
?>