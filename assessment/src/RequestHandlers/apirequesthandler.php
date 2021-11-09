<?php
    namespace Src\RequestHandlers;
    class APIRequestHandler extends RequestHandler{

        protected function parse($request){
            switch($request->getAPIPath()){
                
            }
        }

        public function render(){
            return json_encode($this->response);
        }
    }