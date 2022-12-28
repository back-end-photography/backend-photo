<?php

include 'db.php'; 
require_once "../Models/Photography.php";

class PhotographyDB extends db{

    function list ()
    {
        $query = $this->connection()->query('SELECT * FROM fotografia');
        $result = array();

        if ($query->rowcount()) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $item = array(
                    "nombre" => $row["nombre"],
                    "ruta" => $row["ruta"],
                    "extension" => $row["extension"],
                    "descripcion" => $row["descripcion"],
                    "nombre_espanol" => $row["nombre_espanol"],
                    "nombre_ingles" => $row["nombre_ingles"],
                    "fecha" => $row["fecha"],
                    "id" => $row["id"]
                );

                $temp = new Photography( $row["nombre"], $row["ruta"], $row["extension"], $row["descripcion"], $row["nombre_espanol"],
                 $row["nombre_ingles"], $row["fecha"], $row["id"]);
       
                array_push($result, $item);
            }
        }

        return $result;
    }

    function insert($req)
    {

        $nombre = $req["nombre"];  
        $ruta = $req["ruta"];
        $extension = $req["extension"];
        $descripcion = $req["descripcion"];
        $nombre_espanol = $req["nombre_espanol"];
        $nombre_ingles = $req["nombre_ingles"];
        $fecha = $req["fecha"];
     
     $temp = new Photography( $req["nombre"], $req["ruta"], $req["extension"], $req["descripcion"], $req["nombre_espanol"],
       $req["nombre_ingles"], $req["fecha"], $req["fecha"]);

        $query = "INSERT INTO fotografia SET 
        nombre=:nombre, ruta=:ruta, extension=:extension, descripcion=:descripcion, nombre_espanol=:nombre_espanol,
        nombre_ingles=:nombre_ingles, fecha=:fecha";



        $stmt = $this->connection()->prepare($query);


        $stmt->bindParam(':nombre',   $temp->getNombre());
        $stmt->bindParam(':ruta',      $temp->getRuta());
        $stmt->bindParam(':extension',     $temp->getExtension());
        $stmt->bindParam(':descripcion',   $temp->getDescripcion());
        $stmt->bindParam(':nombre_espanol',   $temp->getNombre_espanol());
        $stmt->bindParam(':nombre_ingles',      $temp->getNombre_ingles());
        $stmt->bindParam(':fecha',     $temp->getDescripcion());

        /*        $stmt->bindParam(':nombre',   $nombre);
        $stmt->bindParam(':ruta',      $ruta);
        $stmt->bindParam(':extension',     $extension);
        $stmt->bindParam(':descripcion',   $descripcion);
        $stmt->bindParam(':nombre_espanol',   $nombre_espanol);
        $stmt->bindParam(':nombre_ingles',      $nombre_ingles);
        $stmt->bindParam(':fecha',     $fecha);*/

        if ($stmt->execute()) {
            return true;
        } else {
            print_r("Error: %s \n", $stmt->error);
            return false;
        }
    }

    function search_by_id($id_photo)
    {
        $query = $this->connection()->query("SELECT * FROM fotografia where id = '" . $id_photo . "' ");
        $item = array();
        if ($query->rowcount()) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $item = array(
                "nombre" => $row["nombre"],
                "ruta" => $row["ruta"],
                "extension" => $row["extension"],
                "descripcion" => $row["descripcion"],
                "nombre_espanol" => $row["nombre_espanol"],
                "nombre_ingles" => $row["nombre_ingles"],
                "fecha" => $row["fecha"],
                "id" => $row["id"]


            );
        }

        return $item;
    }

    function delete($id_photo)
    {
        $query = "DELETE FROM fotografia where id = :id_photo";

        $stmt = $this->connection()->prepare($query);
    
        $stmt->bindParam(':id_photo', $id_photo);

        if ($stmt->execute()) {
            return true;
        } else {
            print_r("Error: %s \n", $stmt->error);
            return false;
        }
    }

    function update($req)
    {
        $id= $req["id"];
        $descripcion = $req["descripcion"];
        $nombre_espanol = $req["nombre_espanol"];
        $nombre_ingles = $req["nombre_ingles"];
        
        

        $query = "UPDATE fotografia SET 
        descripcion=:descripcion, nombre_espanol=:nombre_espanol, nombre_ingles=:nombre_ingles  WHERE id = :id ";

        $stmt = $this->connection()->prepare($query);
        $stmt->bindParam(':id',     $id);
        $stmt->bindParam(':descripcion',     $descripcion);
        $stmt->bindParam(':nombre_espanol',   $nombre_espanol);
        $stmt->bindParam(':nombre_ingles',      $nombre_ingles);
        

        if ($stmt->execute()) {
            return true;
        } else {
            print_r("Error: %s \n", $stmt->error);
            return false;
        }
    }



}

?>