<?php
class Request{
    private $basepath = BASEPATH;
    private $path = "";

    public function __construct(){
        $this->setPath();
    }
    private function getURI(){
        return $_SERVER['REQUEST_URI'];
    }
    private function setPath(){
        $path = parse_url($this->getURI())['path'];
        $path = str_replace($this->basepath, "", $path);
        $path = strtolower(trim($path, "/"));
        $this->path = $path;
    }
    public function getPath(){
        return $this->path;
    }
    public function isAPI(){
        return preg_match("/api.*/", $this->path);
    }
    public function getAPIPath(){
        return trim(preg_replace("/^api/","",$this->getPath()), "/");
    }
    public function getParameter($param){
        $param = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        return $param;
    }
}

?>