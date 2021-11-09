<?php
namespace Config\Handlers;

use Config\Handlers\Handler;

class HTMLExceptionHandler extends Handler{
    public function handle($e){
        echo "<p>internal server error! (Status 500)</p>";
        if (DEVMODE) {
            echo "<p>";
            echo "Message: ".  $e->getMessage();
            echo "<br>File: ". $e->getFile();
            echo "<br>Line: ". $e->getLine();
            echo "</p>";
        }
    }
}