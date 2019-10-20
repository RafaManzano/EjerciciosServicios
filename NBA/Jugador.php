<?php


class Jugador
{
    private $nombre;
    private $apellidos;
    private $edad;
    private $foto;
    private $idEquipo;


    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getIdEquipo()
    {
        return $this->idEquipo;
    }

    public function setIdEquipo($idEquipo)
    {
        $this->idEquipo = $idEquipo;
    }


}