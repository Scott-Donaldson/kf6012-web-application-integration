<?php
include 'config/config.php';

use Src\Requests as Requests;
use Src\RequestHandlers as RequestHandler;
$req = new Requests\Request();

if(!$req->isAPI()) set_exception_handler([new Config\Handlers\HTMLExceptionHandler(), 'handle']);

$request_handler = ($req->isAPI()) ? new RequestHandler\APIRequestHandler($req): new RequestHandler\HTMLRequestHandler($req);
echo $request_handler->process();