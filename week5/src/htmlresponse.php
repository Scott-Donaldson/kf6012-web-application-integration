<?php
class HTMLResponse extends Response{

    protected function headers(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/html; charset=UTF-8");
    }
    public static function sendError($code, $title, $message){
        $a['errors'] = Array("status"=>"$code","title"=>"$title","message"=>"$message");
        return json_encode($a);
    }
}
?>