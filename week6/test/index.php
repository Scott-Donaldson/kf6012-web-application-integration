<?php

require 'config/config.php';

use Src\Webpages as Webpage;
use Src\Database as Database;
$x = new Database\connection();
$test = new Webpage\Home();
echo "test";