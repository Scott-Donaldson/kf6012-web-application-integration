<?php
namespace Src\Responses;

use Src\Responses\Response;

class HTMLResponse extends Response{
    protected function headers(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/html; charset=UTF-8");
    }
}