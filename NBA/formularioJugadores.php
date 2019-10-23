<?php
echo '<form method="post">';
echo '<label for = "nombre">Nombre: </label>';
echo '<input type = "text" name = "nombre"> <br>';
echo '<label for = "apellidos">Apellidos: </label>';
echo '<input type = "text" name = "apellidos"> <br>';
echo '<label for = "edad">Edad: </label>';
echo '<input type = "number" name = "edad"> <br>';
echo '<label for = "foto"> Foto:</label>';
echo '<input type = "file" name = "foto"> <br>';
echo '<button type = "submit">Enviar </button>';
echo '</form>';