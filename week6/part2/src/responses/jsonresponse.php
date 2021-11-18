<?php
namespace Src\Responses;

use Src\Responses\Response;

class JSONResponse extends Response{
    private $message;
    private $statusCode;
    protected function headers(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    }

    public function setMessage($msg){
        $this->message = $msg;
    }
    public function setStatusCode($code){
        $this->statusCode = $code;
    }
    public function getData(){

        if(is_null($this->message)){
            if(count($this->data) == 0){
                $this->message = "No Content"; 
                $this->statusCode = 204;
            }else{
                $this->message = "Ok";
                $this->statusCode = 200;
            }
        }

        if($this->statusCode == 200){
            $res = Array(
                "message" => $this->message,
                "status" => $this->statusCode,
                "count" => count($this->data),
                "timestamp" => date("Y-m-d-H:i:s"),
                "results" => $this->data
            );
        }else{
            $res = Array(
                "status" => $this->statusCode,
                "message" => $this->message,
                "timestamp" => date("Y-m-d-H:i:s"),
                "path" => strtok($_SERVER['REQUEST_URI'], '?')
            );
        }

        return json_encode($res);
    }
}