<?php
namespace Src\RequestHandlers;

use Src\Responses\HTMLResponse;
use Src\Responses\JSONResponse;

abstract class RequestHandler{

    protected $request;
    protected $response;

    public function __construct($request){
        $this->request = $request;
        $this->response = ($request->isAPI())? new JSONResponse() : new HTMLResponse();
        $this->parse($this->request);
    }
    public function process(){
        return $this->response->getData();
    }
    protected function parse($request){

    }
    public function getResponse(){
        return $this->response;
    }
    public function setResponse($res){
        $this->response = $res;
    }
}