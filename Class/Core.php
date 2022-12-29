<?php

require_once("Response.php");
class Core
{


    function DataValidation($data_input)
    {

        $response = new Response();

        if ($data_input == null || !json_decode($data_input)) {
            echo json_encode($response->error_400());
            return false;
        } else {
            return true;
        }
    }
}
