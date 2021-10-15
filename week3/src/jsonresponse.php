<?php
class JSONResponse{
    private $array = null;
    public function __construct($arr){
        $this->array = $arr;
    }
    private function setHeaders(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        header("Content-Type: application/json; charset=UTF-8");
    }
    public function sendResponse(){
        $this->setHeaders();
        return json_encode($this->array);
    }
    public static function sendError($code, $title, $message){
        $a['errors'] = Array("status"=>"$code","title"=>"$title","message"=>"$message");
        return json_encode($a);
    }
}
?>