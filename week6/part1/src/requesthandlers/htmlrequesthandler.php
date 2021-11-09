<?php
    namespace Src\RequestHandlers;

use Src\Controllers\HTML as Controllers;

class HTMLRequestHandler extends RequestHandler{

        protected function parse($request){
            switch($request->getPath()){
                default:
                case 'home':
                    $this->response = "home";
                    break;
                case 'documentation':
                    $controller = new Controllers\DocumentationController($request, $this->response);
                    break;
            }
        }
    }