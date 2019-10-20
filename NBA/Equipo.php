<?php


class Equipo
{
    private $id;
    private $nombre;
    private $jugadores;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getJugadores()
    {
        return $this->jugadores;
    }

    public function setJugadores($jugadores)
    {
        $this->jugadores = $jugadores;
    }


}