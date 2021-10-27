<?php
function errorHandler($errno, $errstr, $errfile, $errline){
    if(DEV_MODE) $message["message"] = "Error Detected: [$errno] $errstr file: $errfile line: $errline";
    else{
        if($errno != 2 && $errno != 8){
            header("Access-Control-Allow-Origin: *"); 
            header("Content-Type: application/json; charset=UTF-8"); 
            $message["message"] = "Error Detected: [$errno] $errstr file: $errfile line: $errline";
        }
    }

}
