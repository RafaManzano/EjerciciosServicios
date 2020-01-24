<?php

require_once "Database.php";

class BBDD
{
    function insertarUsuario(){
        $nickname = "";
        $password = "";
        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("INSERT INTO Usuarios (nickname, password) VALUES (?, ?)");

        // Vinculamos parámetros a variables
        $stmt->bind_param('ss', $nickname, $password);
        // Establecemos los parámetros y ejecutamos
        $nickname = $_POST['uname'];
        $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);



        $stmt->execute();
        $stmt->close();
        $instanciaCon -> closeConnection();

    }

    function saberUsuarioRegistrado() {
        $pasa = false;
        $nickname = "";
        $nicknameBBDD = "";
        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("SELECT nickname FROM Usuarios WHERE nickname = ?");

        // Vinculamos parámetros a variables
        $stmt->bind_param('s', $nickname);
        // Establecemos los parámetros y ejecutamos
        $nickname = $_POST['uname'];

        $stmt->execute();

        $stmt -> bind_result($nicknameBBDD);
        while($stmt -> fetch()) {
            if($nickname == $nicknameBBDD) {
                $pasa = true;
            }
        }
        $stmt->close();
        $instanciaCon -> closeConnection();
        return $pasa;
    }

    function comprobarRegistro() {
        $pasa = false;
        $passUser = "";
        $nickname = "";
        $password = "";
        $instanciaCon = Database::getInstance();
        $conexionBD = $instanciaCon->getConnection();

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("SELECT password FROM Usuarios WHERE nickname = ?");

        // Vinculamos parámetros a variables
        $stmt->bind_param('s', $nickname);
        // Establecemos los parámetros y ejecutamos
        $nickname = $_POST['uname'];
        $passUser = $_POST['psw'];

        $stmt->execute();

        $stmt -> bind_result( $password);
        while ($stmt -> fetch()) {
            if(password_verify($passUser, $password)) {
                $pasa = true;
            }
        }
        $stmt->close();
        $instanciaCon -> closeConnection();
        return $pasa;
    }

}

$bbdd = new BBDD();
if(!$bbdd -> saberUsuarioRegistrado()) {
    $bbdd -> insertarUsuario();
    echo "Registro guardado con exito!";
}
else {
    if($bbdd ->comprobarRegistro()) {
        echo "Login Correcto";
    }
    else {
        echo "Login Incorrecto";
    }
}

