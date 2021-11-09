<?php
function error($errno, $errstr, $errfile, $errline){
    if (($errno != 2 && $errno != 8) || DEVMODE) {
        throw new Exception("Error Detected: [$errno] $errstr file: $errfile line: $errline", 1);
    }
}