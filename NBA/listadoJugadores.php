<?php
require_once "tablaJugadores.php";
require_once "bbdd.php";

//$idEquipo = 1;
$bbdd = new bbdd();
$result = $bbdd -> jugadoresDeUnEquipo(1);
$row = $result;

echo '<a href="formularioJugadores.php"></a>';
if ($result  > 0) {
    echo '<table border=\"1\">';
    echo '<tr>';
    echo '<td>'. tablaJugadores::NOMBRE  .'</td>';
    echo '<td>'. tablaJugadores::APELLIDOS  .'</td>';
    echo '<td>'. tablaJugadores::EDAD .'</td>';
    echo '<td>'. tablaJugadores::FOTO .'</td>';
    echo '<td>'. tablaJugadores::ID_EQUIPO .'</td>';
    echo '</tr>';

    while($row.fetch()) {
        echo '<tr>';
        echo '<td>'. $row["nombre"]  .'</td>';
        echo '<td>'. $row["apellidos"]  .'</td>';
        echo '<td>'. $row["edad"] .'</td>';
        echo '<td>'. $row["foto"] .'</td>';
        echo '<td>'. $row["idEquipo"] .'</td>';
        echo '<td> <button onclick="informacion()">Informacion</button>';
        echo '<td> <button onclick="eliminarJugador()">Eliminar</button>';
        echo '</tr>';
    }
    echo '</table>';
}

