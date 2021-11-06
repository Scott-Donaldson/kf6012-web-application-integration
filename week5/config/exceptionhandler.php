<?php
    function exceptionHandler($e){
        echo "500 Internal Server Error";
        if(DEV_MODE){
            echo "Message: ". $e->getMessage()();
            echo "File: ". $e->getFile();
            echo "Line: ". $e->getLine();
        }
    }
?>