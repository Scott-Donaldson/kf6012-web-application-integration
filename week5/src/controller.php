<?php
class Controller {

    private $request;
    private $reponse;
    protected $gateway;

    public function __construct($res, $req){
        $this->setGateway();
        $this->setRequest($req);
        $this->setResponse($res);

        $data = $this->processRequest();
        $this->getResponse()->setData($data);
    }
    private function setRequest($request) {
        $this->request = $request;
    }

    protected function getRequest() {
        return $this->request;
    }

    private function setResponse($response) {
        $this->response = $response;
    }

    private function getResponse() {
        return $this->response;
    }

    protected function setGateway() {

    }

    protected function getGateway() {
        return $this->gateway;
    }
    protected function processRequest(){
        
    }
}