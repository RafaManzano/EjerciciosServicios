<?php

require_once "Controller.php";


class LibroController extends Controller
{
    public function manageGetVerb(Request $request)
    {
        //Para el token
        $cadena = $request ->getLlave();
        $token['Authorization'] = "Bearer " . $cadena;

        $listaLibros = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaLibros = LibroHandlerModel::getLibro($id);

        if ($listaLibros != null) {
            $code = '200';
        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, $token, $listaLibros, $request->getAccept());
        $response->generate();

    }

    //Prueba para el post
    public function managePostVerb(Request $request)
    {
        $id = null;
        $response = null;
        $code = null;
        $body = null;

        //Para el token
        $cadena = $request ->getLlave();
        $token['Authorization'] = "Bearer " . $cadena;

        $body = $request->getBodyParameters();
        //$json = $body->json_decode();
        $titulo = $body->titulo;
        //$codigo = $body->codigo;
        $numpag = $body->numpag;
        //$libro = new LibroModel1($titulo, $numpag);
        //$libro = new LibroModel($titulo, $numpag);
        $libro = new LibroModel();
        $libro -> setTitulo($titulo);
        $libro -> setNumpag($numpag);

        $funciona = LibroHandlerModel::insertLibro($libro);

        if ($funciona) {
            $code = '200';
        }
        else {
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }
        }
        $response = new Response($code, $token, $libro, $request->getAccept());
        $response->generate();
    }

    public function managePutVerb(Request $request)
    {
        $id = null;
        $response = null;
        $code = null;
        $body = null;
        //Para el token
        $cadena = $request ->getLlave();
        $token['Authorization'] = "Bearer " . $cadena;

        $body = $request->getBodyParameters();
        //$json = $body->json_decode();
        $titulo = $body->titulo;
        $codigo = $body->codigo;
        $numpag = $body->numpag;
        $libro = new LibroModel();
        $libro -> setCodigo($codigo);
        $libro -> setTitulo($titulo);
        $libro -> setNumpag($numpag);
        //$libro = new LibroModel($codigo, $titulo, $numpag);

        $funciona = LibroHandlerModel::actualizarLibro($libro);

        if ($funciona) {
            $code = '200';
        }
        else {
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }
        }
        $response = new Response($code, $token, $libro, $request->getAccept());
        $response->generate();
    }

    public function manageDeleteVerb(Request $request)
    {
        $id = null;
        $response = null;
        $code = null;
        $body = null;

        //Para el token
        $cadena = $request ->getLlave();
        $token['Authorization'] = "Bearer " . $cadena;

        $body = $request->getBodyParameters();
        //$json = $body->json_decode();
        $codigo = $body->codigo;
        //$libro = new LibroModel($body);

        $funciona = LibroHandlerModel::eliminarLibro($codigo);

        if ($funciona) {
            $code = '200';
        }
        else {
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }
        }
        $response = new Response($code, $token, $request->getAccept());
        $response->generate();
    }

}