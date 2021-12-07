<?php
namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Gateways\FilmGateway;

class FilmController extends Controller{
    protected function setGateway(){
        $this->gateway = new FilmGateway();
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
        $lang = $this->getRequest()->getParameter("lang");
        $actor = $this->getRequest()->getParameter("actor_id");

        if(!is_null($id)) $this->getGateway()->findOne($id);
        else if (!is_null($limit) && !is_null($offset)) $this->getGateway()->findByOffset($limit,$offset);
        else if (!is_null($lang)) $this->getGateway()->findLanguage($lang);
        else if (!is_null($actor)) $this->getGateway()->findActor($actor);
        else $this->getGateway()->findAll();

        if(!is_null($limit) && !is_null($offset)){
            $this->response .= ["next" => $this->getGateway()->getNext($limit, $offset)];
        }
        return $this->getGateway()->getResult();
    }
}