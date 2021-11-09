<?php
include 'config/autoloader.php';
spl_autoload_register('autoloader');

define('BASEPATH', '/week6/test/');
define('DATABASE', 'database/filmes2021.sqlite');
define('DEVMODE', true);

ini_set('display_errors', DEVMODE);
ini_set('display_startup_errors', DEVMODE);

set_exception_handler([new Config\Handlers\JSONExceptionHandler(), 'handle']);

include 'config/handlers/error.php';
set_error_handler('error');