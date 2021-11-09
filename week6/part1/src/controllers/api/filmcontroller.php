<?php
namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Gateways\FilmGateway;

class FilmController extends Controller{
    protected function setGateway(){
        $this->gateway = new FilmGateway();
    }

    protected function processRequest(){
        $result_object = Array();
        $id = $this->getRequest()->getParameter("id");
        $limit = $this->getRequest()->getParameter("limit");
        $offset = $this->getRequest()->getParameter("offset");

        if(!is_null($id)) $this->getGateway()->findOne($id);
        else if (!is_null($limit) && !is_null($offset)) $this->getGateway()->findByOffset($limit,$offset);
        else $this->getGateway()->findAll();

        $result_object = ["results" => $this->getGateway()->getResult()];

        if(filter_var($this->getRequest()->getParameter("meta"), FILTER_VALIDATE_BOOLEAN)){
            $result_object += ["_total" => $this->getGateway()->getCount(),
                              "_time"  => $this->getGateway()->getTime()];
        }



        if(!is_null($limit) && !is_null($offset)){
            $result_object += ["_next" => $this->getGateway()->getNext($limit, $offset)];
        }
        
        return $result_object;
    }
}