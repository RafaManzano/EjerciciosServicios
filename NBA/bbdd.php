<?php

require_once "Database.php";
class bbdd
{

    function insertarEquipo($equipo){
        $numeroJugadores = 0;
        $nombre = "";
        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("INSERT INTO Equipos (nombre, numeroJugadores) VALUES (?, ?)");

        // Vinculamos parámetros a variables
        $stmt->bind_param('si', $nombre, $numeroJugadores);
        // Establecemos los parámetros y ejecutamos
        $nombre = $equipo->getNombre();
        $numeroJugadores = $equipo->getJugadores();

        $stmt->execute();
        $stmt->close();
        $instanciaCon -> closeConnection();
    }

    function insertarJugador($jugador, $idEquipo){
        $nombre = "";
        $apellidos = "";
        $edad = 0;
        $foto = 0;
        $id = $idEquipo;

        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("INSERT INTO Jugadores (nombre, apellidos, edad, foto, idEquipo) VALUES (?, ?, ?, ?, ?)");

        // Vinculamos parámetros a variables
        $stmt->bind_param('ssibi', $nombre, $apellidos, $edad, $foto,$id);
        // Establecemos los parámetros y ejecutamos
        $nombre = $jugador->getNombre();
        $apellidos = $jugador->getApellidos();
        $edad = $jugador->getEdad();
        $foto = $jugador->getFoto();
        $id = $jugador->getIdEquipo();

        $stmt->execute();
        $stmt->close();
        $instanciaCon -> closeConnection();
    }

    function todosEquipos() {
        $conBD = Database ::getInstance();
        $mysqli = $conBD->getConnection();
        $sql= "SELECT ". tablaEquipos::ID . " , "
            . tablaEquipos::NOMBRE . " , "
            . tablaEquipos::NUMERO_JUGADORES
            ." FROM ". tablaEquipos::TABLE_NAME;
        $result = $mysqli->query($sql);
        return $result;
    }

    function jugadoresDeUnEquipo($idEquipo) {
        $nombre = "";
        $apellidos = "";
        $edad = 0;
        $foto = 0;
        $id = $idEquipo;
        $result = null;

        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();

        // Preparamos la sentencia
        $stmt= "SELECT ". tablaJugadores::NOMBRE . " , "
            . tablaJugadores::APELLIDOS . " , "
            . tablaJugadores::EDAD. " , "
            . tablaJugadores::FOTO. " , "
            . tablaJugadores::ID_EQUIPO
            ." FROM ". tablaEquipos::TABLE_NAME
            . "WHERE ". tablaJugadores::ID_EQUIPO. "= ?";

        // Vinculamos parámetros a variables
        $stmt->bind_param('i', $id);

        //Vinculamos el resultado a una variable
        $stmt->bind_result($result);

        $id = $idEquipo;

        $stmt->execute();

        $stmt->close();
        $instanciaCon -> closeConnection();
        return $result;

    }

    function eliminarEquipo($id){
        $idEquipo = 0;
        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("DELETE FROM Equipos WHERE id = ?");

        // Vinculamos parámetros a variables
        $stmt->bind_param('i', $idEquipo);
        // Establecemos los parámetros y ejecutamos
        $idEquipo = $id;

        $stmt->execute();
        $stmt->close();
        $instanciaCon -> closeConnection();
    }

    function eliminarJugador($nombre, $apellidos) {
        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();
        $nombreJugador = "";
        $apellidosJugador = "";

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("DELETE FROM Jugadores WHERE nombre = ? AND apellidos = ?");

        // Vinculamos parámetros a variables
        $stmt->bind_param('ss', $nombreJugador, $apellidosJugador);
        // Establecemos los parámetros y ejecutamos
        $nombreJugador = $nombre;
        $apellidosJugador = $apellidos;

        $stmt->execute();
        $stmt->close();
        $instanciaCon -> closeConnection();
    }
}