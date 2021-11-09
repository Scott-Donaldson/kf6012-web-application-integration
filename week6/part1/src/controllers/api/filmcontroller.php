<?php
namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Gateways\FilmGateway;

class FilmController extends Controller{
    protected function setGateway(){
        $this->gateway = new FilmGateway();
    }

    protected function processRequest(){
        $id = $this->getRequest()->getParameter("id");

        if(!is_null($id)) $this->gateway->findOne($id);
        else $this->getGateway()->findAll();
        
        return $this->getGateway()->getResult();
    }
}