<?php
include 'config/autoloader.php';
spl_autoload_register('autoloader');

define('BASEPATH', '/week11/');
define('DATABASE', 'src/database/films2021.sqlite');
define('USER_DATABASE', 'src/database/user.sqlite');
define('DEVMODE', true);
define('SECRET_KEY', "XYZ123");

ini_set('display_errors', DEVMODE);
ini_set('display_startup_errors', DEVMODE);

set_exception_handler([new Config\Handlers\JSONExceptionHandler(), 'handle']);

include 'config/handlers/error.php';
set_error_handler('error');