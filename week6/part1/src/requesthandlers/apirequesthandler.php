<?php
namespace Src\RequestHandlers;

use Src\Controllers\Api as Controllers;

class APIRequestHandler extends RequestHandler{

        protected function parse($request){
            switch($request->getAPIPath()){
                case 'films':
                    $contoller = new Controllers\FilmController($request, $this->response);
                    break;
                case 'actors':
                    $this->response = "actors";
                    break;
                default:
                    $controller = new Controllers\DefaultController($request, $this->response);
                    break;
            }
        }
    }