<?php 
namespace Config\Handlers;

use Config\Handlers\Handler;

class JSONExceptionHandler extends Handler{
    public function handle($e){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    
        $output['error'] = "internal server error! (Status 500)";
    
        if (DEVMODE) {
            $output['Message'] = $e->getMessage();
            $output['File'] = $e->getFile();
            $output['Line'] = $e->getLine();
            $output['StackTrace'] = $e->getTraceAsString();
        }
    
        echo json_encode($output);
    }
}