<?php

namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Gateways\ViewingListGateway;

use Src\Firebase\JWT\JWT;
use Src\Firebase\JWT\Key;

class ViewingListController extends Controller {
    protected function setGateway(){
        $this->gateway = new ViewingListGateway();
    }
    protected function processRequest(){
        
        if(!$this->getRequest()->getRequestMethod() === "POST"){
            $this->getResponse()->setMessage("Method Not Allowed");
            $this->getResponse()->setStatusCode(405);
            return;
        }

        $token = $this->getRequest()->getParameter('token');
        $add = $this->getRequest()->getParameter('add');
        $remove = $this->getRequest()->getParameter('remove');

        if(is_null($token)){
            $this->getResponse()->setMessage("Unauthorised");
            $this->getResponse()->setStatusCode(401);
            return;
        }

        $key = SECRET_KEY;
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $uid = $decoded->user_id;

        if(!is_null($add)) $this->getGateway()->add($uid, $add);
        else if(!is_null($remove)) $this->getGateway()->remove($uid, $remove);
        else $this->getGateway()->findAll($uid);

        return $this->getGateway()->getResult();
    }
}