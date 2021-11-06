<?php
class DocumentController extends Controller {
    protected function processRequest(){
        $page = new Webpage("Week 5", "documentation", "assets/style.css");
        $page->addParagraph("The quick brown fox jumps over the lazy dog");
        return $page->generateWebpage();
    }
}