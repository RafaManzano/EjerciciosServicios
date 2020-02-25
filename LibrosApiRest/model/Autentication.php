<?php

use Firebase\JWT\JWT;

require_once "JWT.php" ;
require_once "ConsUsuariosModel.php" ;
require_once "SignatureInvalidException.php";
require_once "ExpiredException.php";

class Autentication
{

    static function hashPassword($password) {
        return password_hash($password);
    }

    static function checkAuthentication($user, $password, $token = null) {
        $pasa = false;
        $pwd = "";
        $db = DatabaseModel::getInstance();
        $db_connection = $db -> getConnection();
        $payload = "";
        $llave = "compadre";

        if($token == null) {
            $query = "SELECT " . \ConstantesDB\ConsUsuariosModel::PASSWORD . " FROM " . \ConstantesDB\ConsUsuariosModel::TABLE_NAME . " WHERE " . \ConstantesDB\ConsUsuariosModel::NAME . " = ? ";
            $prep_query = $db_connection->prepare($query);
            $prep_query->bind_param('s', $user);
            $prep_query->execute();
            $prep_query->bind_result($pwd);
            while ($prep_query->fetch()) {
                if (self::verifyPassword($password, $pwd)) {
                    $pasa = true;
                }
            }
        }
        else {
            try {
                JWT::decode($token, $llave, array('HS256'));
                $pasa = true;
            }
            catch (Exception $e) {
                echo 'Ha ocurrido un error de autenticacion';
            }

        }
        return $pasa;
    }

    static function verifyPassword($password, $hashPWD) {
        return password_verify($password, $hashPWD);
    }

    static function checkUser($request) {
        $pasa = false;
        $nombre = "";
        $name = "";
        $db = DatabaseModel::getInstance();
        $db_connection = $db -> getConnection();
        $body = null;


        $body = $request->getBodyParameters();
        $nombre = $body->name;

        $query = "SELECT " . \ConstantesDB\ConsUsuariosModel::NAME. " FROM " . \ConstantesDB\ConsUsuariosModel::TABLE_NAME . " WHERE " . \ConstantesDB\ConsUsuariosModel::NAME . " = ? ";
        $prep_query = $db_connection -> prepare($query);
        $prep_query -> bind_param('s', $nombre);
        $prep_query -> execute();
        $prep_query -> bind_result( $name);
        while($prep_query -> fetch()) {
            if($nombre == $name) {
                $pasa = true;
            }
        }

        return $pasa;
    }

    static function generateToken($usuario = "null") {
        $llave = "compadre";
        $rol = self::rolDeUsuario($usuario);
        $payload = array(
            "iss" => "http://biblioteca.devel",
            "exp" => time() + 500,
            "rol" => $rol
        );

        $jwt = JWT::encode($payload, $llave);
        return $jwt;
    }

    static function rolDeUsuario($usuario) {
        $rol = "null";
        $db = DatabaseModel::getInstance();
        $db_connection = $db -> getConnection();


        if($usuario != "null") {
            $query = "SELECT " . \ConstantesDB\ConsUsuariosModel::ROL. " FROM " . \ConstantesDB\ConsUsuariosModel::TABLE_NAME . " WHERE " . \ConstantesDB\ConsUsuariosModel::NAME . " = ? ";
            $prep_query = $db_connection -> prepare($query);
            $prep_query -> bind_param('s', $usuario);
            $prep_query -> execute();
            $prep_query -> bind_result( $rol);
        }
        return $rol;
    }

    static function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }
    /**
     * get access token from header
     * */
    static function getBearerToken() {
        $headers = self::getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }
}