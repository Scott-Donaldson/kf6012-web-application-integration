<?php
namespace Src\RequestHandlers;

abstract class RequestHandler{

    protected $request;
    protected $response;

    public function __construct($request){
        $this->request = $request;
        $this->parse($this->request);
    }
    public function render(){

    }
    protected function parse($request){

    }
}