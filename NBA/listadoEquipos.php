<?php
require_once "tablaEquipos.php";
require_once "bbdd.php";


$bbdd = new bbdd();
$result = $bbdd->todosEquipos();
echo '<a href=formularioEquipo.php>Añadir Equipo</a>';

if ($result->num_rows > 0) {
    echo '<table border=\"1\">';
    echo '<tr>';
    echo '<td>'. tablaEquipos::ID  .'</td>';
    echo '<td>'. tablaEquipos::NOMBRE  .'</td>';
    echo '<td>'. tablaEquipos::NUMERO_JUGADORES .'</td>';
    echo '</tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'. $row["id"]  .'</td>';
        echo '<td>'. $row["nombre"]  .'</td>';
        echo '<td>'. $row["numeroJugadores"] .'</td>';
        echo '<td> <button onclick="informacion()">Informacion</button>';
        echo '<td> <button onclick="eliminarEquipo()">Eliminar</button>';
        echo '</tr>';
    }
    echo '</table>';
}

