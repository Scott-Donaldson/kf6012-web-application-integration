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
                    $controller = new Controllers\ActorController($request, $this->response);
                    break;
                case 'authenticate':
                    $controller = new Controllers\AuthenticationController($request, $this->response);
                    break;
                case 'viewinglist':
                    $controller = new Controllers\ViewingListController($request, $this->response);
                    break;
                default:
                    $controller = new Controllers\DefaultController($request, $this->response);
                    break;
            }
        }
    }