<?php

namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Gateways\AuthenticationGateway;

class AuthenticationController extends Controller {

    protected function setGateway(){
        $this->gateway = new AuthenticationGateway();
    }
    protected function processRequest(){
        $data = [];

        if(!$this->getRequest()->getRequestMethod() === "POST"){
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
            return;
        }

        $email = $this->getRequest->getParameter("email");
        $password = $this->getRequest->getParameter("password");

        if(!is_null($email) && !is_null($password)){
            $this->getGateway->findPassword($email);

            if(count($this->getGateway()->getResult()) == 1){
                $hashedpassword = $this->getGateway->getResult()[0]['password'];

                if(password_verify($password, $hashedpassword)) $data['token'] = "1234";

            }
        }

        if(!array_key_exists('token', $data)){
            $this->getResponse()->setMessage("Unauthorized");
            $this->getResponse()->setStatusCode(401);
        }

        return $data;
    }
}