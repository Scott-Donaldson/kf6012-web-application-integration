<?php
include 'config/autoloader.php';
spl_autoload_register("autoloader");

include 'config/exceptionhandlerjson.php';
include 'config/exceptionhandler.php';
set_exception_handler('exceptionHandlerJson');

include 'config/errorhandler.php';
set_error_handler('errorHandler');

define('BASEPATH', '/week5/');
define('DATABASE', 'db/films2021.sqlite');

define('DEV_MODE', true);
?>