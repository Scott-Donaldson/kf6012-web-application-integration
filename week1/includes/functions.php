<?php
    /**
     * Takes two string arguments: Greeting + Name
     * returns H1 HTML with greeting and name
     */
    function greeting($greeting,$name){
        return "<h1>$greeting, $name!</h1>";
    }
    /**
     * Takes a Time of day (morning | afternoon | evening | night)
     * and returns greeting associated with time of day including
     * name
     */
    function greet($part_of_day, $name){
        $a["morning"]   = "Good Morning";
        $a["afternoon"] = "Hello";
        $a["evening"]   = "Good Evening";
        $a["night"]     = "Yawn, Good night";

        if(array_key_exists($part_of_day, $a)){
            $greeting = $a[$part_of_day];
        }else{
            $greeting = "Hi";
        }
        if(strlen($name) <= 0) $name = "Friend";
        return "$greeting, $name!";
    }
    /**
     * used to include a php file automatically and
     * independant of system os.
     * 
     * file must be in "./includes" subfolder
     */
    function file_to_include($filename){
        $x = DIRECTORY_SEPERATOR;
        return strtolower("./includes" . $x . $filename . ".php");
    }
?>