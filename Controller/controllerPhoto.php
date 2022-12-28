<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT,OPTIONS,DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
require_once ("../Database/PhotographyDB.php");

$service = new PhotographyDB();
$result = "API";
$req = json_decode(file_get_contents("php://input"), true);

switch ($_SERVER['REQUEST_METHOD']) {

    case "GET":

        if ((isset($_GET["id"]))) {
            $result = $service->search_by_id($_GET["id"]);
 
        } else {

        $result = $service->list();

        }
        echo json_encode($result);
        break;
    case "POST":
        $result = $service->insert($req);
        break;
    case "PUT":
         $result = $service->update($req); 
        break;
    case "DELETE":
        $result = $service->delete($_GET["id"]); 
        break;
    }

?>