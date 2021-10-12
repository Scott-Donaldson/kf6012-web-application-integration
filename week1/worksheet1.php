<?php
    include file_to_include("header");
    include file_to_include("footer");
    include file_to_include("functions");

    echo header_html();
    echo hello("Hello","World") . "<br>";
    $names = array("auntie" => "Cher", "uncle" => "Elton", "brother" => "Elvis", "sister" => "Dolly");

    foreach($names as $k => $v){
        echo greet("afternoon", $v) . "<br>";
    }
    echo footer_html();
?>
