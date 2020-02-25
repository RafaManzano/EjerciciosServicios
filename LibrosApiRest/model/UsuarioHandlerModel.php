<?php

require_once "ConsUsuariosModel.php";

class UsuarioHandlerModel
{

    public static function postUsuario(UsuarioModel $usuario) { //No haria falta poner la clase, pero asi te autocompleta
        $db = DatabaseModel::getInstance();
        $db_connection = $db -> getConnection();

        $name = $usuario -> getName();
        $password = $usuario -> getPassword();
        $rol = $usuario -> getRol();

        $query = "INSERT INTO " . \ConstantesDB\ConsUsuariosModel::TABLE_NAME . "( " . \ConstantesDB\ConsUsuariosModel::NAME . " , " .\ConstantesDB\ConsUsuariosModel::PASSWORD . " , ". \ConstantesDB\ConsUsuariosModel::ROL. ") VALUES (?,?);";
        $prep_query = $db_connection -> prepare($query);
        $prep_query -> bind_param('ss', $name, $password, $rol);
        return $prep_query -> execute();
    }
}