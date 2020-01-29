<?php

require_once "ConsUsuariosModel.php" ;

class Autentication
{

    static function hashPassword($password) {
        return password_hash($password);
    }

    static function checkUserPassword($user, $password) {
        $pasa = false;
        $pwd = "";
        $db = DatabaseModel::getInstance();
        $db_connection = $db -> getConnection();

        $query = "SELECT " . \ConstantesDB\ConsUsuariosModel::PASSWORD. " FROM " . \ConstantesDB\ConsUsuariosModel::TABLE_NAME . " WHERE " . \ConstantesDB\ConsUsuariosModel::NAME . " = ? ";
        $prep_query = $db_connection -> prepare($query);
        $prep_query -> bind_param('s', $user);
        $prep_query -> execute();
        $prep_query -> bind_result( $pwd);
        while($prep_query -> fetch()) {
            if(self::verifyPassword($password, $pwd)) {
                $pasa = true;
            }
        }

        return $pasa;
    }

    static function verifyPassword($password, $hashPWD) {
        return password_verify($password, $hashPWD);
    }

}