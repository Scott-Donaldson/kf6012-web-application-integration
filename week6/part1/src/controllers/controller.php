<?php

namespace Src\Controllers;

abstract class Controller{
    
    private $request;
    private $response;
    protected $gateway;

    public function __construct($request,$response){
        $this->setGateway();
        $this->setRequest($request);
        $this->setResponse($response);

        $data = $this->processRequest($request);
        $this->getResponse()->setData($data);
    }

    private function setRequest($req){
        $this->request = $req;
    }
    protected function getRequest(){
        return $this->request;
    }
    private function setResponse($res){
        $this->response = $res;
    }
    private function getResponse(){
        return $this->response;
    }
    protected function setGateway(){

    }
    protected function getGateway(){
        return $this->gateway;
    }
    protected function processRequest(){

    }
}