<?php
include './webpage.php';

$homepage   = new Homepage("Week 2", "Week 2 Title", "Welcome to the Home Page");
echo $homepage->generateWebpage();
?>