<?php

require_once("Response.php");
class Core
{


    function DataValidation($data_input)
    {

        $response = new Response();

        if (trim($data_input) == "" || !json_decode($data_input)) {
            echo ($response->error_400());
            return false;
        } else {
            return true;
        }
    }
}
