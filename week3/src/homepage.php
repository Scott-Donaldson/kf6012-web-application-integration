<?php
class HomePage extends Webpage{
    public function __construct($title, $h1, $h2, $css){
        parent::__construct($title, $h1, $css);
        $this->addH2($h2);
    }
    private function addH2($text){
        $this->setBody($this->getBody() . "<h2>$text</h2>");
    }
}
?>