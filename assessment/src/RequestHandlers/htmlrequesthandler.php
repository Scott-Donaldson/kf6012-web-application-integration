<?php
    namespace Src\RequestHandlers;
    class HTMLRequestHandler extends RequestHandler{

        protected function parse($request){
            switch($request->getPath()){
                
            }
        }

        public function render(){
            return $this->response;
        }
    }