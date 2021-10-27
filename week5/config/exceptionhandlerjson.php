<?php

function exceptionHandlerJson($e){
    if(DEV_MODE) $message = $e->getMessage();
    else $message = "";
    header("Access-Control-Allow-Origin: *"); 
    header("Content-Type: application/json; charset=UTF-8"); 
    $a['errors'] = Array("status"=>"500","title"=>"Internal Server Error","message"=>"$message");
    echo json_encode($a);
}