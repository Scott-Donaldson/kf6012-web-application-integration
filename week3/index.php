<?php
include_once 'src/autoloader.php';
spl_autoload_register('autoloader');
$css = 'assets/style.css';

$arr1['name'] = "Jane Doe";
$arr1['stu_id'] = "w12345678";
$arr1['pages'] = Array("documentation"=>"week3/documentation", "contact"=>"week3/contact");

$arr2['breakfast'] = "Monster Energy and a Scotch Egg";
$arr2['dinner'] = "Spoons 11\" pizza";
$arr2['tea'] = "Turkey Twizzlers";

$arr3['week1'] = "PHP Basics";
$arr3['week2'] = "Object Oriented PHP";
$arr3['week3'] = "Web API";
$arr3['week4'] = "SQLite databases";

$req = new Request();

if($req->isAPI()){
    switch($req->getAPIPath()){
        case "":
            $req = new JSONResponse($arr1);
            echo $req->sendResponse($arr1);            
            break;
        case "meals":
            $req = new JSONResponse($arr2);
            echo $req->sendResponse($arr2);       
            break;
        case "topics":
            $req = new JSONResponse($arr3);
            echo $req->sendResponse($arr3);       
            break;
        default:
            echo JSONResponse::sendError("404","API Endpoint not found", "The Endpoint you are looking for might have been moved?");
            break;
    }
}else{
    switch($req->getPath()){
        case '':
        case 'home':
            $home_page = new HomePage("Welcome", "Home", "Test", $css);
            echo $home_page->generateWebpage();
            break;
        case 'contact':
            $contact_page = new ContactPage("Contact Page", "Contact Us", $css);
            echo $contact_page->generateWebpage();
            break;
        case 'documentation':
        $documentation_page = new Webpage("Documentation Page", "Documentation", $css);
        echo $documentation_page->generateWebpage();
            break;
        default: 
            echo "Err404 Page not found";
            break;
    }
}
?>