<?php
require_once "tablaJugadores.php";
require_once "bbdd.php";

$idEquipo = 1;
$bbdd = new bbdd();
$result = bbdd::jugadoresDeUnEquipo($idEquipo);

echo '<button onclick="<a href="formularioJugador.php"></a>"</button>';
if ($result->num_rows > 0) {
    echo '<table border=\"1\">';
    echo '<tr>';
    echo '<td>'. tablaJugadores::NOMBRE  .'</td>';
    echo '<td>'. tablaJugadores::APELLIDOS  .'</td>';
    echo '<td>'. tablaJugadores::EDAD .'</td>';
    echo '<td>'. tablaJugadores::FOTO .'</td>';
    echo '<td>'. tablaJugadores::ID_EQUIPO .'</td>';
    echo '</tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'. tablaJugadores::NOMBRE  .'</td>';
        echo '<td>'. tablaJugadores::APELLIDOS  .'</td>';
        echo '<td>'. tablaJugadores::EDAD .'</td>';
        echo '<td>'. tablaJugadores::FOTO .'</td>';
        echo '<td>'. tablaJugadores::ID_EQUIPO .'</td>';
        echo '<td> <button onclick="informacion()">Informacion</button>';
        echo '<td> <button onclick="eliminarJugador()">Eliminar</button>';
        echo '</tr>';
    }
    echo '</table>';
}

