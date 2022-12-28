<?php

class Photography{

    private $id;
    private $nombre;
    private $ruta;
    private $extension;
    private $descripcion;
    private $nombre_espanol;
    private $nombre_ingles;
    private $fecha;


    public function __construct($nombre, $ruta, $extension, $descripcion, $nombre_espanol, $nombre_ingles, $fecha, $id)
    {
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->extension = $extension;
        $this->descripcion = $descripcion;
        $this->nombre_espanol = $nombre_espanol;
        $this->nombre_ingles = $nombre_ingles;
        $this->fecha = $fecha;
        $this->id = $id;
        
    }

    public function getid()
    {
        return $this->id;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getRuta()
    {
        return $this->ruta;
    }
 
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    public function getExtension()
    {
        return $this->extension;
    }
 
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getNombre_espanol()
    {
        return $this->nombre_espanol;
    }
 
    public function setNombre_espanol($nombre_espanol)
    {
        $this->nombre_espanol = $nombre_espanol;
    }

    public function getNombre_ingles()
    {
        return $this->nombre_ingles;
    }
 
    public function setNombre_ingles($nombre_ingles)
    {
        $this->nombre_ingles = $nombre_ingles;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


}

?>