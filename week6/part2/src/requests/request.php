<?php
namespace Src\Requests;

class Request{
    private $basepath = BASEPATH;
    private $path;

    public function __construct(){
        $this->path = parse_url($this->getURI())['path'];
        $this->path = strtolower(str_replace($this->basepath, "", $this->path));
        $this->path = trim($this->path, "/");
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
        return filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function isAPI(){
        return preg_match("/api.*/", $this->path);
    }
}