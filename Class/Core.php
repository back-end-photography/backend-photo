<?php

require_once("Response.php");
class Core
{


    function DataValidation($data_input, $typeOfValidation)
    {

        $response = new Response();

        if($typeOfValidation=="format"){

        if ($data_input == null || !json_decode($data_input)) {
            echo json_encode($response->error_400());
            return false;
        } else {
            return true;
        }
    }else{

        if($data_input == null || $data_input == 0){
            echo json_encode($response->error_401());
            return false;
        }else{
            return true;
        }
    }
}

    
}
