<?php
/**
 * A Basic webpage class to generate and render a html page
 * 
 * @author scrub w19019810
 */
class Webpage{

    private $head = "";
    private $body = "";
    private $foot = "";

    public function __construct($title, $heading, $stylesheet){
        $this->setHead($title, $stylesheet);
        $this->addH1($heading);
        $this->setFoot();
    }

    public function addParagraph($text){
        $this->body .= $text;
    }
    public function generateWebpage(){
        return $this->getHead() . $this->getBody() . $this->getFoot();
    }
    private function getHead(){
        return $this->head;
    }
    protected function setHead($title, $stylesheet){
        $this->head = <<<EOT
        <html>
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>$title</title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="$stylesheet">
            </head>
        <body>
EOT;
    }
    protected function getBody(){
        return $this->body;
    }
    protected function setBody($body){
        $this->body = $body;
    }
    private function getFoot(){
        return $this->foot;
    }
    private function setFoot(){
        $this->foot = <<<EOT
            </body>
            </html>
        EOT;
    }
    protected function addH1($text){
         $this->setBody($this->getBody() . "<h1>$text</h1>");
    }
}
?>