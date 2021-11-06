<?php
include_once 'config/config.php';
$css = BASEPATH . 'assets/style.css';

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

$db = new Database(DATABASE);

$req = new Request();

$res = ($req->isApi())
    ? new JSONResponse()
    : new HTMLResponse();

if($req->isAPI()){
    switch($req->getAPIPath()){
        case "":         
            break;
        case "meals":   
            break;
        case "topics":
            break;
        case 'films':
            break;
        case 'actors':
            $controller = new ApiActorController($res,$req);
            break;
        default:
            break;
    }
}else{
    set_exception_handler('exceptionHandler');
    switch($req->getPath()){
        case '':
        case 'home':
            break;
        case 'contact':
            break;
        case 'documentation':
            $controller = new DocumentController($res, $req);
            break;
        default: 
            break;
    }
}
echo $res->getData();
?>