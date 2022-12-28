<?php

require_once("../api-google/vendor/autoload.php");

class CloudDrive
{

    function saveCloud()
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=cargaarchivos-372023-661c63a7f06c.json');

        $client = new Google_client();

        $client->useApplicationDefaultCredentials();

        $client->setScopes(['https://www.googleapis.com/auth/drive.file']);

        try{

            $nombre = $_FILES['archivos']['name'];
            $extension = $_FILES['archivos']['type'];
        
            $service = new Google_Service_Drive($client);
            $file_path = $_FILES['archivos']['tmp_name'];
        
            $file = new Google_Service_Drive_DriveFile();
            $file->setName($file_path);
        
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $file_path);
        
        
            $file->setParents(array("1etWSbU_VFWcWAlWdRfChBE5hgXID-uVp"));
            $file->setDescription("Lo he cargado");
            $file->setMimeType($mime_type);
        
            $result = $service->files->create(
                $file,
                array(
                    'data'=> file_get_contents($file_path),
                    'mimeType'=> $mime_type,
                    'uploadType' => "media"
                )
            );
        
           // $ruta = 'https://drive.google.com/open?id='.$result->id;
           // $ruta2 = $result->id;
        
           // $service = new fotografiaDB();
           // $service->insertar($nombre,$ruta2,$extension);
        
           // echo '<a href="'.$ruta.'" target=" _blank">'.$result->name .'</a>';
           
        } catch(Google_Service_Exception $gs){
        
            $mensaje = json_decode($gs->getMessage());
            echo $mensaje->error->message();
         
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
}
