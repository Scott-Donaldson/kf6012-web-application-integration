<?php
namespace Src\Requests;

class Request{
    private $basepath = BASEPATH;
    private $path;
    private $requestMethod;

    public function __construct(){
        $this->path = parse_url($this->getURI())['path'];
        $this->path = strtolower(str_replace($this->basepath, "", $this->path));
        $this->path = trim($this->path, "/");

        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }
    public function getURI(){
        return $_SERVER['REQUEST_URI'];
    }
    public function getPath(){
        return $this->path;
    }

    public function getAPIPath(){
        return trim(preg_replace("/^api/","",$this->getPath()), "/");
    }

    public function getParameter($param){
        $rm = $this->getRequestMethod();
        if($rm === "GET") $res = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        if($rm === "POST") $res = filter_input(INPUT_POST, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        return $res;
    }

    public function getRequestMethod(){
        return $this->requestMethod;
    }

    public function isAPI(){
        return preg_match("/api.*/", $this->path);
    }
}