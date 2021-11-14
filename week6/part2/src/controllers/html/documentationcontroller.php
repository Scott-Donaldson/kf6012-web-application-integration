<?php

namespace Src\Controllers\HTML;

use Src\Controllers\Controller;

class DocumentationController extends Controller{
    public function processRequest(){
        $data = <<<  EOT
            This is a test
        EOT;
        return $data;
    }
}