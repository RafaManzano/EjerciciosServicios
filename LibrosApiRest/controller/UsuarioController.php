<?php

require_once "Controller.php";


class UsuarioController extends Controller
{

    //IsValid
    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }

    //GET
    public function manageGetVerb(Request $request)
    {


    }

    //POST
    public function managePostVerb(Request $request)
    {
        $id = null;
        $response = null;
        $code = null;
        $body = null;

        $body = $request->getBodyParameters();
        $name = $body->name;
        $password = $body->password;
        $hashPassword = password_hash($password, PASSWORD_DEFAULT); //Deberia estar en una clase Autentication

        $usuario = new UsuarioModel();
        $usuario -> setName($name);
        $usuario -> setPassword($hashPassword);

        $funciona = UsuarioHandlerModel::postUsuario($usuario);

        if ($funciona) {
            $code = '200';
        }
        else {
            if (UsuarioHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }
        }
        $response = new Response($code, null, $usuario, $request->getAccept());
        $response->generate();

    }

    //PUT
    public function managePutVerb(Request $request)
    {

    }

    //DELETE
    public function manageDeleteVerb(Request $request)
    {

    }

}