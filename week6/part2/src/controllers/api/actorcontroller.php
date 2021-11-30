<?php
namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Gateways\ActorGateway;

class ActorController extends Controller{
    protected function setGateway(){
        $this->gateway = new ActorGateway();
    }

    protected function processRequest(){
        if($this->getRequest()->getRequestMethod() !== "GET"){
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode("405");
            return $this->getResponse();
        };

        $id = $this->getRequest()->getParameter("id");
        $limit = $this->getRequest()->getParameter("limit");
        $offset = $this->getRequest()->getParameter("offset");

        if(!is_null($id)) $this->getGateway()->findOne($id);
        else $this->getGateway()->findAll();

        if(!is_null($limit) && !is_null($offset)){
            $this->response .= ["next" => $this->getGateway()->getNext($limit, $offset)];
        }
        return $this->getGateway()->getResult();
    }
}