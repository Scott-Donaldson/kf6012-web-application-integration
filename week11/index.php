<?php
include 'config/config.php';

use Src\Requests;
use Src\RequestHandlers;
$req = new Requests\Request();

if(!$req->isAPI()) set_exception_handler([new Config\Handlers\HTMLExceptionHandler(), 'handle']);

$request_handler = ($req->isAPI()) ? new RequestHandlers\APIRequestHandler($req): new RequestHandlers\HTMLRequestHandler($req);
echo $request_handler->process();