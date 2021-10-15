<?php
class ContactPage extends Webpage{
    public function __construct($title, $h1, $css){
        parent::__construct($title, $h1, $css);
        $this->addContact();
    }
    private function addContact(){
        $this->setBody($this->getBody() . "<section>contact</section>");
    }
}
?>